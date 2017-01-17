<?php
defined('BASEPATH') or die('Sem Permissão');

class Task extends CI_Controller{
  public function index(){
    $this->load->model(array('TaskModel', 'TagModel'));

    $user = authorize(1);

    $tasksToDo = $this->TaskModel->searchAllByUserAndStatus($user->id_user, 0);
    $tasksDone = $this->TaskModel->searchAllByUserAndStatus($user->id_user, 1);

    $tags = $this->TagModel->searchByUser($user->id_user);

    $page = array(
      'page_title' => 'Minhas Tarefas',
      'page_content' => 'task/list',
      'user' => $user,
      'tasks' => $tasksToDo,
      'tasksDone' => $tasksDone,
      'tags' => $tags,
    );

    $this->load->view('public/base', $page);
  }

  public function insert(){
    $user = authorize(1);

    $this->load->model('TaskModel');

    $task = new stdClass();
    $task->user_id = $user->id_user;
    $task->tag_id = $this->input->post('tag', true);
    $task->title = $this->input->post('title', true);
    $task->description = $this->input->post('description', true);
    $task->priority = $this->input->post('priority', true);
    $task->created_in = date('d/m/Y H:i:s');

    $this->TaskModel->insert($task);

    $this->session->set_flashdata('success', 'Nova Tarefa Inserida');

    redirect('/tarefas');
  }

  public function edit($id){
    $user = authorize(1);

    $task = $this->thisIsMyTask($id, $user->id_user);

    $this->load->model('TagModel');
    $tags = $this->TagModel->searchByUser($user->id_user);

    $page = array(
      'page_title' => 'Editar Tarefa',
      'page_content' => 'task/edit',
      'user' => $user,
      'task' => $task,
      'tags' => $tags,
    );

    $this->load->view('public/base', $page);
  }

  public function update($id){
    $user = authorize(1);

    $task = $this->thisIsMyTask($id, $user->id_user);

    $newTask = new stdClass();
    $newTask->title = $this->input->post('title', true);
    $newTask->description = $this->input->post('description', true);
    $newTask->priority = $this->input->post('priority', true);
    $newTask->tag_id = $this->input->post('tag', true);

    $this->TaskModel->updateById($newTask, $id);

    $this->session->set_flashdata('success', 'Tarefa Atualizada');

    redirect('tarefas');
  }

  public function delete($id){
    $user = authorize(1);

    $task = $this->thisIsMyTask($id, $user->id_user);

    $this->TaskModel->deleteById($id);

    $this->session->set_flashdata('success', 'Tarefa Excluída');

    redirect('tarefas');
  }

  public function complete($id){
    $user = authorize(1);

    $task = $this->thisIsMyTask($id, $user->id_user);

    $newTask = new stdClass();
    $newTask->status = 1;
    $newTask->completed_in = datetime_current();

    $this->TaskModel->updateById($newTask, $id);

    $this->session->set_flashdata('success', 'Tarefa Concluída');

    redirect('tarefas');
  }

  public function reopen($id){
    $user = authorize(1);

    $task = $this->thisIsMyTask($id, $user->id_user);

    $newTask = new stdClass();
    $newTask->status = 0;
    $newTask->completed_in = '';

    $this->TaskModel->updateById($newTask, $id);

    $this->session->set_flashdata('success', 'Tarefa Reaberta');

    redirect('tarefas');
  }

  public function thisIsMyTask($id_task, $user_id){
    $this->load->model('TaskModel');

    $task = $this->TaskModel->searchByIdAndUser($id_task, $user_id);

    if(!$task){
      $this->session->set_flashdata('error', 'Tarefa Inválida');
      redirect('tarefas');
    }

    return $task;
  }
}

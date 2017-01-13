<?php
defined('BASEPATH') or die ("Sem Permissão");

class TaskModel extends CI_Model{
  protected $table = 'tb_task';

  public function insert(stdClass $newTask){
    $this->db->insert($this->table, $newTask);

    return true;
  }

  public function searchAllByUser($id){
    $this->db->where('user_id', $id);
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchById($id){
    $this->db->where('id_task', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function updateById($email, $id, $newData){
    $tasks = TaskModel::searchAll($email);

    $tasks[$id] = $newData;

    TaskModel::save($email, $tasks);

    return true;
  }

  public function deleteById($email, $id){
    $tasks = TaskModel::searchAll($email);

    unset($tasks[$id]);

    array_multisort($tasks);

    TaskModel::save($email, $tasks);

    return true;
  }

  public function save($email, $tasks){
    $fileJson = json_encode($tasks, JSON_PRETTY_PRINT);

    file_put_contents(FCPATH."database/tasks/$email.json", $fileJson);

    return true;
  }

  public function updateFileName($email, $newEmail){
    $tasks = TaskModel::searchAll($email);
    unlink(FCPATH."database/tasks/$email.json");

    TaskModel::save($newEmail, $tasks);
    return true;
  }
}

<?php
defined('BASEPATH') or die ("Sem Permissão");

class TaskModel extends CI_Model{
  protected $table = 'tb_task';

  public function insert(stdClass $newTask){
    $this->db->insert($this->table, $newTask);

    return $this->db->insert_id();
  }

  public function searchAllByUserAndStatus($user_id, $status){
    $this->db->select('id_task, title, tb_task.description, priority, tb_task.created_in, completed_in, name, color');
    $this->db->where($this->table.'.user_id', $user_id);
    $this->db->where('status', $status);
    $this->db->join('tb_tag', 'tag_id = id_tag');
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchById($id){
    $this->db->where('id_task', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchByIdAndUser($id, $user_id){
    $this->db->select('tb_task.*, name');
    $this->db->where('id_task', $id);
    $this->db->where('tb_task.user_id', $user_id);
    $this->db->join('tb_tag', 'tag_id = id_tag');
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function updateById(stdClass $task, $id){
    $this->db->where('id_task', $id);
    $this->db->update($this->table, $task);

    return true;
  }

  public function deleteById($id){
    $this->db->where('id_task', $id);
    $this->db->delete($this->table);

    return true;
  }

  public function deleteByUser($id){
    $this->db->where('user_id', $id);
    $this->db->delete($this->table);

    return true;
  }

}

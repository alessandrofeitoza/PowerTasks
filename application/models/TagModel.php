<?php
defined('BASEPATH') or exit('Sem Permissão');

class TagModel extends CI_Model{
  protected $table = 'tb_tag';

  public function insert(stdClass $tag){
    $this->db->insert($this->table, $tag);
    return $this->db->insert_id();
  }

  public function deleteById($id){
    $this->db->where('id_tag', $id);
    $this->db->delete($this->table);

    return true;
  }

  public function deleteByUser($user_id){
    $this->db->where('user_id', $user_id);
    $this->db->delete($this->table);

    return true;
  }

  public function updateById(stdClass $tag, $id){
    $this->db->where('id_tag', $id);
    $this->db->update($this->table, $tag);

    return true;
  }

  public function searchById($id){
    $this->db->where('id_tag', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchByUser($user_id){
    $this->db->where('user_id', $user_id);
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchByIdAndUser($id, $user_id){
    $this->db->where('id_tag', $id);
    $this->db->where('user_id', $user_id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }
}

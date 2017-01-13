<?php
defined('BASEPATH') or die ("Sem Permissão");

class UserModel extends CI_Model{
  protected $table = 'tb_user';

  public function searchByEmail($email){
    $this->db->where('email', $email);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchAll(){
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchById($id){
    $this->db->where('id_user', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function insert(stdClass $user){
    $this->db->insert($this->table, $user);

    return true;
  }

  public function updateById(stdClass $user, $id){
    $this->db->where('id_user', $id);
    $this->db->update($this->table, $user);

    return true;
  }

  public function deleteByEmail($email){
    $this->db->where('email', $email);
    $this->db->delete($this->table);

    return true;
  }

}

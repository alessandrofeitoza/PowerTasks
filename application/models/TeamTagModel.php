<?php
defined('BASEPATH') or exit('Sem Permissão');

class TeamTagModel extends CI_Model{
  protected $table = 'tb_teamtag';

  public function insert(stdClass $teamTag){
    $this->db->insert($this->table, $teamTag);

    return $this->db->insert_id();
  }

  public function searchAllByTeam($team_id){
    $this->db->where('team_id', $team_id);
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchById($id){
    $this->db->where('id_teamtag', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchByIdAndTeam($id, $team_id){
    $this->db->where('id_teamtag', $id);
    $this->db->where('team_id', $team_id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function deleteById($id){
    $this->db->where('id_teamtag', $id);
    $this->db->delete($this->table);

    return true;
  }

  public function deleteByUser($user_id){
    $this->db->where('created_by', $user_id);
    $this->db->delete($this->table);

    return true;
  }

  public function updateById(stdClass $teamTag, $id){
    $this->db->where('id_teamtag', $id);
    $this->db->update($this->table, $teamTag);

    return true;
  }
}

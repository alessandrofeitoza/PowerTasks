<?php
defined('BASEPATH') or exit('Sem Permissão');

class TeamTaskModel extends CI_Model{
  protected $table = 'tb_teamtask';

  public function insert(stdClass $task){
    $this->db->insert($this->table, $task);

    return $this->db->insert_id();
  }

  public function updateById(stdClass $task, $id){
    $this->db->where('id_teamtask', $id);
    $this->db->limit(1);
    $this->db->update($this->table, $task);

    return true;
  }

  public function deleteById($id){
    $this->db->where('id_teamtask', $id);
    $this->db->delete($this->table);

    return true;
  }

  public function deleteByTeam($team_id){
    $this->db->where('team_id', $team_id);
    $this->db->delete($this->table);

    return true;
  }

  public function searchByIdAndTeam($id, $team_id){
    $this->db->select('id_teamtask, teamtag_id, color, name, tb_teamtask.description, tb_teamtask.created_in, priority, title, completed_in');
    $this->db->where('id_teamtask', $id);
    $this->db->where('tb_teamtask.team_id', $team_id);
    $this->db->join('tb_teamtag', 'teamtag_id = id_teamtag');
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchAllByTeamAndStatus($team_id, $status){
    $this->db->select('tb_user.name AS user_name, id_teamtask, color, tb_teamtag.name, tb_teamtask.description, tb_teamtask.created_in, priority, title, completed_in');
    $this->db->where('tb_teamtask.team_id', $team_id);
    $this->db->where('status', $status);
    $this->db->join('tb_teamtag', 'teamtag_id = id_teamtag');
    $this->db->join('tb_user', 'tb_teamtask.created_by = id_user');
    $this->db->from($this->table);

    return $this->db->get()->result();
  }


}

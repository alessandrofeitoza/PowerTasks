<?php
defined('BASEPATH') or exit('Sem Permissão');

class TeamModel extends CI_Model{
  protected $table = 'tb_team';

  public function insert(stdClass $team){
    $this->db->insert($this->table, $team);

    return $this->db->insert_id();
  }

  public function searchTeamsThatIManagement($admin_id){
    $this->db->where('admin_id', $admin_id);
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function iManageThisTeam($id, $admin_id){
    $this->db->where('admin_id', $admin_id);
    $this->db->where('id_team', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchById($id){
    $this->db->where('id_team', $id);
    $this->db->limit(1);
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function updateById(stdClass $team, $id){
    $this->db->where('id_team', $id);
    $this->db->update($this->table, $team);

    return true;
  }

  public function deleteById($id){
    $this->db->where('id_team', $id);
    $this->db->delete($this->table);

    return true;
  }
}

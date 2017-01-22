<?php
class TeamMemberModel extends CI_Model{
  protected $table = 'tb_teammember';

  public function insertMemberInTeam($teamMember){
    $this->db->insert($this->table, $teamMember);
    return $this->db->insert_id();
  }

  public function removeMemberOfTeam($team_id, $member_id){
    $this->db->where('team_id', $team_id);
    $this->db->where('member_id', $member_id);

    $this->db->delete($this->table);

    return true;
  }

  public function removeAllMembersOfTeam($team_id){
    $this->db->where('team_id', $team_id);
    $this->db->from($this->table);

    return true;
  }

  public function searchAllMembersOfTeam($team_id){
    $this->db->select('name, photo, id_user, tb_teammember.created_in');
    $this->db->where('team_id', $team_id);
    $this->db->join('tb_user', 'id_user = member_id');
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchAllTeamsOfMember($member_id){
    $this->db->where('member_id', $member_id);
    $this->db->from($this->table);

    return $this->db->get()->result();
  }

  public function searchAvailableMembersForThisTeam($team_id, $id_user){
    $this->db->select('name, photo, id_user');
    $this->db->where('id_user!=', $id_user);
    $this->db->where("(member_id IS NULL || team_id!='$team_id')");
    $this->db->join('tb_user', 'id_user = member_id', 'RIGHT OUTER');
    $this->db->from($this->table);


    return $this->db->get()->result();
  }

  public function searchMemberInTeam($id, $member_id){
    $this->db->select('tb_team.*, tb_teammember.*');
    $this->db->where('member_id', $member_id);
    $this->db->where('id_team', $id);
    $this->db->limit(1);
    $this->db->join('tb_team', 'team_id = id_team');
    $this->db->from($this->table);

    return $this->db->get()->row();
  }

  public function searchTeamsIParticipateIn($member_id){
    $this->db->select('tb_team.*, tb_teammember.*');
    $this->db->where('member_id', $member_id);
    $this->db->join('tb_team', 'team_id = id_team');
    $this->db->from($this->table);

    return $this->db->get()->result();
  }
}

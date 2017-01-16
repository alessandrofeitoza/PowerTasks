<?php
defined('BASEPATH') or exit('Sem Permissão');

require_once(APPPATH.'controllers/Team.php');

class TeamMember extends Team{
  public function view($team_id){
    $user = authorize(1);

    $this->load->model('TeamMemberModel');
    $team = parent::iManageThisTeam($team_id, $user->id_user);

    $availableMembers = $this->TeamMemberModel->searchAvailableMembersForThisTeam($team_id, $user->id_user);

    $members = $this->TeamMemberModel->searchAllMembersOfTeam($team_id);

    $page = [
      'page_title' => 'Gerenciar Time',
      'page_content' => 'team/view',
      'user' => $user,
      'team' => $team,
      'availableMembers' => $availableMembers,
      'members' => $members,
    ];

    $this->load->view('public/base', $page);
  }

  public function addMember(){
    $team_id = $this->input->post('team_id', true);
    $member_id = $this->input->post('member_id', true);

    $user = authorize(1);

    $this->load->model('TeamMemberModel');

    $team = parent::iManageThisTeam($team_id, $user->id_user);

    $teamMember = ['member_id'=>$member_id, 'team_id'=>$team_id, 'created_in'=>datetime_current()];
    $this->TeamMemberModel->insertMemberInTeam($teamMember);

    $this->session->set_flashdata('success', 'Novo Usuário inserido no grupo');
    redirect('time/'.$team_id.'#members');
  }

  public function removeMember($team_id, $member_id){

  }
}

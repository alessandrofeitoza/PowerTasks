<?php
defined('BASEPATH') or die("Sem Permissão");

class User extends CI_Controller{
  public function index(){
    if(!$this->session->userdata('user-powertasks')){
      $this->login();
    }else{
      redirect("/tarefas");
    }
  }

  public function login(){
    if($this->session->userdata('user-powertasks')){
      redirect('/');
    }
    $this->load->view("public/login");
  }

  public function authenticate($email = false, $password = false){
    if(!$email){
      $email = filter_var($this->input->post('email', true), FILTER_VALIDATE_EMAIL);
      $password = $this->input->post('password', true);
    }

    $this->load->model('UserModel');

    $user = $this->UserModel->searchByEmail($email);

    if(!$user){
      $this->session->set_flashdata('error', 'Usuário não encontrado');
      $this->session->set_flashdata('email', $email);
      redirect("/");
    }

    if(!password_verify($password, $user->password)){
      $this->session->set_flashdata('error', 'Senha Incorreta');
      $this->session->set_flashdata('email', $email);
      redirect("/");
    }

    $this->session->set_userdata('user-powertasks', $user);
    $this->session->set_flashdata('success', "Bem vindo $user->name");
    redirect("/tarefas");
  }

  public function insert(){
    $newUser = new stdClass();
    $newUser->name = html_escape($this->input->post('name', true));
    $newUser->email = filter_var($this->input->post('email', true), FILTER_VALIDATE_EMAIL);
    $newUser->password = password_hash(html_escape($this->input->post('password', true)), PASSWORD_BCRYPT);
    $newUser->first_access = datetime_current();
    $newUser->photo = 'user.png';

    $this->load->model('UserModel');

    $this->UserModel->insert($newUser);
    $this->authenticate($newUser->email, $this->input->post('password', true));

    redirect("/");
  }

  public function profile(){
    $user = authorize(1);

    $page = array(
      'user' => $user,
      'page_content' => 'user/profile',
      'page_title' => 'Minha Conta',
    );

    $this->load->view('public/base', $page);
  }

  public function updateAccount(){
    $user = authorize(1);

    $this->load->model('UserModel');

    $extension = explode(".", $_FILES['photo']['name']);
    $filename = $user->id_user.".".end($extension);

    $config['upload_path']          = './assets/img/users/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name'] = $filename;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('photo')){
      $this->session->set_flashdata('error', 'Problemas com o upload da imagem, tente outra.');
      redirect('/perfil');
    }

    $newEmail = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL);
    if($newEmail != $user->email && $this->UserModel->searchByEmail($newEmail)){
      $this->session->set_flashdata('error', 'Já existe conta com este email');
      redirect('/perfil');
    }

    $user->name = html_escape($this->input->post('name'));
    $user->photo = $filename;
    $user->email = $newEmail;
    if($this->input->post('password') != ""){
      $user->password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
    }

    $this->UserModel->updateById($user, $user->id_user);

    $this->session->set_flashdata('success', 'Perfil Atualizado');
    redirect('/perfil');
  }

  public function logout(){
    $this->session->unset_userdata('user-powertasks');

    $this->session->set_flashdata('success', "Você saiu");
    redirect("/");
  }

}

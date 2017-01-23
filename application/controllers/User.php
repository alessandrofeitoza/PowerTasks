<?php
defined('BASEPATH') or die("Sem Permissão");

class User extends CI_Controller{
  public function index(){
    if(!$this->session->userdata('user-powertasks')){
      redirect('entrar');
    }

    $user = $this->session->userdata('user-powertasks');

    $this->load->model(array('TeamModel', 'TeamMemberModel', 'TaskModel', 'TagModel', 'TeamTaskModel'));

    $myTasksToDo = $this->TaskModel->searchAllByUserAndStatus($user->id_user, 0);
    $myTasksDone = $this->TaskModel->searchAllByUserAndStatus($user->id_user, 1);
    $myTags = $this->TagModel->searchByUser($user->id_user);
    // $tasksTeamToDo = $this->TeamTaskModel->searchAllByUserAndStatus($user->id_user, 0);
    $myTeams = array_merge($this->TeamModel->searchTeamsThatIManagement($user->id_user), $this->TeamMemberModel->searchAllTeamsOfMember($user->id_user));

    $page = [
      'page_title' => 'Dashboard',
      'page_content' => 'user/dashboard',
      'user'=>$user,
      'myTasksToDo' => $myTasksToDo,
      'myTasksDone' => $myTasksDone,
      'myTags' => $myTags,
      // 'tasksTeamToDo' => count($tasksTeamToDo),
      'myTeams' => $myTeams,
    ];

    $this->load->view('public/base', $page);
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
      redirect("entrar");
    }

    if(!password_verify($password, $user->password)){
      $this->session->set_flashdata('error', 'Senha Incorreta');
      $this->session->set_flashdata('email', $email);
      redirect("entrar");
    }

    $this->session->set_userdata('user-powertasks', $user);
    $this->session->set_flashdata('success', "Bem vindo $user->name");
    redirect('/');
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

    redirect('/');
  }

  public function profile(){
    $user = authorize(1);

    $page = [
      'user' => $user,
      'page_content' => 'user/profile',
      'page_title' => 'Minha Conta',
    ];

    $this->load->view('public/base', $page);
  }

  public function updateAccount(){
    $user = authorize(1);

    $this->load->model('UserModel');

    $newEmail = filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL);
    if($newEmail != $user->email && $this->UserModel->searchByEmail($newEmail)){
      $this->session->set_flashdata('error', 'Já existe conta com este email');
      redirect('perfil');
    }

    $user->name = html_escape($this->input->post('name'));
    $user->email = $newEmail;
    if($this->input->post('password') != ""){
      $user->password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
    }

    if($_FILES['photo']['name'] != ""){
      $filename = upload_photo($user->id_user, 'photo', './assets/img/users/');

      if(!$filename){
        $this->session->set_flashdata('error', 'Por favor tente outra imagem');
        redirect('perfil');
      }

      $user->photo = $filename;
    }


    $this->UserModel->updateById($user, $user->id_user);

    $this->session->set_flashdata('success', 'Perfil Atualizado');
    redirect('perfil');
  }

  public function logout(){
    $this->session->unset_userdata('user-powertasks');

    $this->session->set_flashdata('success', "Você saiu");
    redirect('entrar');
  }

  public function recoverypass(){
    $email = $this->input->post('email', true);

    if(!$email){
      redirect('entrar');
    }

    $this->load->model('UserModel');

    $user = $this->UserModel->searchByEmail($email);

    if(!$user){
      $this->session->set_flashdata('error', 'Email não encontrado!');
      redirect('entrar');
    }

    $key = sha1(uniqid( mt_rand(), true));

    $newRecovery = new stdClass();
    $newRecovery->recovery = $key;
    $this->UserModel->updateById($newRecovery, $user->id_user);

    //Inicia o processo de configuração para o envio do email
    $config['protocol'] = 'mail'; // define o protocolo utilizado
    $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
    $config['validate'] = TRUE; // define se haverá validação dos endereços de email
    $config['mailtype'] = 'html';
    $this->email->from('seuemail@email.com', 'FEITOZA technology'); // Remetente
    $this->email->to($email, $user->name); // Destinatário
    $this->email->subject('[PowerTasks] - Recuperação de Senha');
    // Define o assunto do email
    $message = "Olá $user->name, você acaba de solicitar a recuperação de senha!";
    $message .= "<br><br> Entre no link abaixo e informe sua nova senha.";
    $message .= '<br><br><a href="'.base_url('recuperarsenha/'.$key).'">'.base_url('recuperarsenha/'.$key).'</a>';
    $this->email->message($message);

    if($this->email->send()){
      $this->session->set_flashdata('success','Um email foi enviado pra você!');
    } else {
      $this->session->set_flashdata('error',$this->email->print_debugger());
    }

    redirect('entrar');
   }

   public function updatepass($key){
     if(!$key){
       redirect('entrar');
     }

     $this->load->model('UserModel');

     $user = $this->UserModel->searchByRecovery($key);

     if(!$user){
       $this->session->set_flashdata('error', 'Link Inválido');
       redirect('entrar');
     }

     $this->load->view('public/recovery', array('key'=>$key));
   }

   public function confirmupdatepass(){
     if(!$this->input->post('key')){
       redirect('entrar');
     }

     $this->load->model('UserModel');

     $user = $this->UserModel->searchByRecovery($this->input->post('key'));

     if(!$user){
       redirect('entrar');
     }

     $newPassword = password_hash(html_escape($this->input->post('password', true)), PASSWORD_BCRYPT);

     $newData = new stdClass();
     $newData->recovery = "";
     $newData->password = $newPassword;

     $this->UserModel->updateById($newData, $user->id_user);

     $this->session->set_flashdata('success', 'Senha Atualizada');

     redirect('entrar');
   }

}

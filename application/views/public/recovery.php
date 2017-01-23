<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Gerenciador de Tarefas Simples</title>
    <meta name="description" content="Pequena aplicação para gerenciar tarefas estilo todoist feito com PHP(codeigniter)">
    <meta name="keywords" content="PHP, CodeIgniter, Tarefas, Todoist">
    <meta name="author" content="Alessandro Feitoza">
    <meta charset="utf-8">

    <link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url('assets/materialloginform/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>">

    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
  </head>

  <body>
    <div class="container">

      <?php validate_message(); ?>
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
        <br><br>
        <div class="container">
          <div class="card"></div>
          <div class="card">

            <h1 class="title">Recuperação de Senha</h1>
            <form action="<?php echo base_url('confirmarsenha'); ?>" method="post">

              <div class="input-container">
                <input type="password" name="password" id="password" required="required"/>
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <label for="password">Informe a nova Senha</label>
                <div class="bar"></div>
              </div>
              <div class="button-container">
                <button><span>Confirmar</span></button><br>
              </div>
            </form>
          </div>

        </div>
      </div>

      </div>
      <script src="<?php echo base_url('assets/materialloginform/events.js'); ?>"></script>
      <footer class="footer text-right">
        <hr>
        <p><strong>TaskPower</strong> | <?php echo date('Y'); ?><br></p>
        Desenvolvido por <a target="_blank" href="http://www.alessandrofeitoza.eu/curriculo">Alessandro Feitoza</a>
      </footer>
    </div>
  </body>
</html>

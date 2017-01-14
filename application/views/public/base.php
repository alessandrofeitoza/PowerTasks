<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>PowerTasks | <?php echo $page_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pequena aplicação para gerenciar tarefas estilo todoist feito com PHP e JSON">
    <meta name="keywords" content="PHP, JSON, CodeIgniter, Tarefas, Todoist">
    <meta name="author" content="Alessandro Feitoza">
    <meta charset="utf-8">

    <link rel="icon" href="<?php echo base_url('assets/img/favicon.png'); ?>" type="image/x-icon">

    <!-- Material Admin Form -->
    <link rel="stylesheet" href="<?php echo base_url('assets/materialloginform/style.css'); ?>">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/sb-admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/sb-admin/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/sb-admin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/sb-admin/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/sb-admin/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- Profile -->
    <link href="<?php echo base_url('assets/css/profile.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/sb-admin/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/sb-admin/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/sb-admin/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/sb-admin/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/sb-admin/vendor/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/sb-admin/data/morris-data.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/sb-admin/dist/js/sb-admin-2.js'); ?>"></script>
</head>

<body>

    <div id="wrapper">

        <?php $this->load->view('user/nav'); ?>

        <div id="page-wrapper">
            <br><br>
            <?php validate_message(); ?>


            <div class="row">
              <div class="col-lg-12">
                <div class="container">
                  <br>
                  <div class="card">
                    <h1 class="title"><?php echo $page_title; ?></h1>

                    <?php $this->load->view($page_content); ?>
                  </div><!-- card -->
                </div><!-- container -->
              </div><!-- col-lg-12 -->
            </div><!-- row -->
            <div class="row">
              <div class="col-lg-12">
                <footer class="footer text-right">
                  <hr>
                  <p><strong>PowerTasks</strong> | <?php echo date('Y'); ?><br></p>
                  Desenvolvido por <a target="_blank" href="http://www.alessandrofeitoza.eu/curriculo">Alessandro Feitoza</a>
                </footer><br><br>
              </div>
            </div>

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->




</body>

</html>

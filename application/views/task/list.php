<script>
  $( document ).ready(function() {

    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('[data-placement="top"]').tooltip();
    $('[data-toggle="popover"]').popover();
    //datatables
    $('#table_tasks').DataTable({
      "order": [[ 0, "desc" ]]
    });

    $('[data-target="#deleteTask"]').on("click", function(){
      $('#confirmDeleteTask').attr('href','excluir/'+$(this).val());
    });
    $('[data-target="#completeTask"]').on("click", function(){
      $('#confirmCompleteTask').attr('href','concluir/'+$(this).val());
    });
    $('[data-target="#reopenTask"]').on("click", function(){
      $('#confirmReopenTask').attr('href','reabrir/'+$(this).val());
    });
  });
  </script>

  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/datatables.bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('assets/datatables/js/jquery.datatables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/datatables.bootstrap.min.js'); ?>"></script>

<div class="row">
  <div class="col-lg-12">
    <br>
    <a href="#addTask" class="btn btn-default" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
      <span class="fa fa-plus-circle"></span> Nova Tarefa
    </a>
    <br><br>
    <div class="collapse" id="addTask">
      <div class="well">
        <?php $this->load->view('task/add'); ?>
      </div>
    </div>

    <br>
    <ul class="nav nav-tabs">
       <li><a href="#tags" data-toggle="tab"><span class="fa fa-tags"></span> Etiquetas</a>
       </li>
       <li class="active"><a href="#todo" data-toggle="tab"><span class="fa fa-exclamation-circle"></span> Para Fazer</a>
       </li>
       <li><a href="#done" data-toggle="tab"><span class="fa fa-check-circle"></span> Feitas</a>
       </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade" id="tags">
        <br>

        <a href="#addTag" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
          <span class="fa fa-plus-circle"></span> Nova Etiqueta
        </a>
        <br><br>
        <div class="collapse" id="addTag">
          <div class="well">
            <?php $this->load->view('tag/add'); ?>
          </div>
        </div>
        <br><br>
        <?php $this->load->view('tag/list'); ?>
      </div>

      <div class="tab-pane fade in active" id="todo">
        <br>

        <?php
          if(!$tasks):
            echo '<div class="alert alert-info">';
              echo '<strong>Parabéns! Você concluiu todas as suas tarefas</strong>';
            echo '</div>';
          else:
          echo '<table class="table table-hover table-striped " id="table_tasks">';
            echo '<thead>';
              echo '<tr>';
                echo '<th>Criou em</th>';
                echo '<th>Titulo</th>';
                echo '<th>Etiqueta</th>';
                echo '<th>Prioridade</th>';
                echo '<th>Opções</th>';
              echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
              foreach($tasks as $task){
                echo '<tr>';
                  echo '<td>',$task->created_in,'</td>';
                  echo '<td><a data-container="body" data-content="',$task->description,'" data-placement="right" data-toggle="popover">',$task->title,'</a></td>';
                  echo '<td><span class="label label-',$task->color,'">',$task->name,'</span></td>';
                  echo '<td><span class="label label-',priority_task($task->priority),'">',$task->priority,'</span></td>';
                  echo '<td>';
                    echo '<button data-placement="top" title="Excluir" data-target="#deleteTask" value="',$task->id_task,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
                    echo '<a data-placement="top" title="Editar" href="',base_url('editar/'.$task->id_task),'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a> ';
                    echo '<button data-placement="top" title="Concluir" data-target="#completeTask" value="'.$task->id_task.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-ok"></span></button>';
                  echo '</td>';
                echo '</tr>';
              }
            echo '</tbody>';
          echo '</table>';
          endif;
        ?>

      </div>

      <div class="tab-pane fade" id="done">
        <br>
        <?php
          if(!$tasksDone):
            echo '<div class="alert alert-info">';
              echo '<strong>Você ainda não concluiu suas tarefas</strong>';
            echo '</div>';
          else:
          echo '<table class="table table-hover table-striped " id="table_tasks">';
            echo '<thead>';
              echo '<tr>';
                echo '<th>Criou em</th>';
                echo '<th>Completou em</th>';
                echo '<th>Titulo</th>';
                echo '<th>Etiqueta</th>';
                echo '<th>Prioridade</th>';
                echo '<th>Opções</th>';
              echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
              foreach($tasksDone as $task){
                echo '<tr>';
                  echo '<td>',$task->created_in,'</td>';
                  echo '<td>',$task->completed_in,'</td>';
                  echo '<td><a data-container="body" data-content="',$task->description,'" data-placement="right" data-toggle="popover">',$task->title,'</a></td>';
                  echo '<td><span class="label label-',$task->color,'">',$task->name,'</span></td>';
                  echo '<td><span class="label label-',priority_task($task->priority),'">',$task->priority,'</span></td>';
                  echo '<td>';
                    echo '<button data-placement="top" title="Excluir" data-target="#deleteTask" value="',$task->id_task,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
                    echo '<button data-placement="top" title="Reabrir" data-target="#reopenTask" value="'.$task->id_task.'" data-toggle="modal" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove-circle"></span></button>';
                  echo '</td>';
                echo '</tr>';
              }
            echo '</tbody>';
          echo '</table>';
          endif;
        ?>

      </div>
    </div><!-- tabs -->

  </div><!-- col-lg-12 -->

</div><!-- row -->


<!-- Modal Excluir -->
<div class="modal fade" id="deleteTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nova Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja excluir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmDeleteTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Concluir -->
<div class="modal fade" id="completeTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Concluir Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja concluir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmCompleteTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Reabrir -->
<div class="modal fade" id="reopenTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reabrir Tarefa</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja reabrir esta tarefa?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmReopenTask" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

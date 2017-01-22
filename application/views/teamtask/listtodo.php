<script>
  $(document).ready(function(){

  });
</script>

<?php
  if(!$tasksToDo):
    echo '<div class="alert alert-info">';
      echo '<strong>Parabéns! Você concluiu todas as suas tarefas</strong>';
    echo '</div>';
  else:
  echo '<table class="table table-hover table-striped " id="table_tasks">';
    echo '<thead>';
      echo '<tr>';
        echo '<th>Criou em</th>';
        echo '<th>Criado por</th>';
        echo '<th>Titulo</th>';
        echo '<th>Etiqueta</th>';
        echo '<th>Prioridade</th>';
        echo '<th>Opções</th>';
      echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
      foreach($tasksToDo as $task){
        echo '<tr>';
          echo '<td>',$task->created_in,'</td>';
          echo '<td>',$task->user_name,'</td>';
          echo '<td><a data-container="body" data-content="',$task->description,'" data-placement="right" data-toggle="popover">',$task->title,'</a></td>';
          echo '<td><span class="label label-',$task->color,'">',$task->name,'</span></td>';
          echo '<td><span class="label label-',priority_task($task->priority),'">',$task->priority,'</span></td>';
          echo '<td>';
            echo '<button data-placement="top" title="Excluir" data-target="#deleteTask" value="',$task->id_teamtask,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
            echo '<a data-placement="top" title="Editar" href="',base_url('time/tarefa/editar/'.$team->id_team.'/'.$task->id_teamtask),'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a> ';
            echo '<button data-placement="top" title="Concluir" data-target="#completeTask" value="'.$task->id_teamtask.'" data-toggle="modal" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-ok"></span></button>';
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
  echo '</table>';
  endif;
?>

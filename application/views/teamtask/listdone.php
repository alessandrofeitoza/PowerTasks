<?php
  if(!$tasksDone):
    echo '<div class="alert alert-info">';
      echo '<strong>Você não concluiu nenhuma tarefa</strong>';
    echo '</div>';
  else:
  echo '<table class="table table-hover table-striped " id="table_tasks">';
    echo '<thead>';
      echo '<tr>';
        echo '<th>Criada em</th>';
        echo '<th>Concluída em</th>';
        echo '<th>Criado por</th>';
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
          echo '<td>',$task->user_name,'</td>';
          echo '<td><a data-container="body" data-content="',$task->description,'" data-placement="right" data-toggle="popover">',$task->title,'</a></td>';
          echo '<td><span class="label label-',$task->color,'">',$task->name,'</span></td>';
          echo '<td><span class="label label-',priority_task($task->priority),'">',$task->priority,'</span></td>';
          echo '<td>';
          echo '<button data-placement="top" title="Excluir" data-target="#deleteTask" value="',$task->id_teamtask,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
          echo '<button data-placement="top" title="Reabrir" data-target="#reopenTask" value="'.$task->id_teamtask.'" data-toggle="modal" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-remove-circle"></span></button>';
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
  echo '</table>';
  endif;
?>

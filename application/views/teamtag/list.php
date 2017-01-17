<script>
  $( document ).ready(function (){
    $('#table_tags').DataTable();

    $('[data-target="#removeTag"]').on("click", function(){
      $('#confirmRemoveTag').attr('href','<?php echo base_url("time/etiqueta/excluir/$team->id_team/"); ?>'+$(this).val());
    });
  });
</script>

<?php
  echo '<table class="table table-hover table-striped " id="table_tags">';
    echo '<thead>';
      echo '<tr>';
        echo '<th>Nome</th>';
        echo '<th>Descrição</th>';
        echo '<th>Criado em</th>';
        echo '<th>Opções</th>';
      echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
      foreach($tags as $id=>$tag){
        echo '<tr>';
          echo '<td><span class="label label-',$tag->color,'">',$tag->name,'</span></td>';
          echo '<td>',$tag->description,'</td>';
          echo '<td>',$tag->created_in,'</td>';

          echo '<td>';
            echo '<button data-placement="top" title="Excluir" data-target="#removeTag" value="',$tag->id_teamtag,'" data-toggle="modal" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button> ';
            echo '<a data-placement="top" title="Editar" href="',base_url('time/etiqueta/editar/'.$team->id_team.'/'.$tag->id_teamtag),'" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span></a> ';
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
  echo '</table>';
?>

<!-- Modal Concluir -->
<div class="modal fade" id="removeTag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir Etiqueta</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info">
          <strong>Você deseja excluir esta etiqueta?</strong>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmRemoveTag" class="btn btn-block btn-lg btn-primary">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('[data-placement="top"]').tooltip();

    $('#table_teams').DataTable({
      responsive: true
    });

    $('[data-target="#deleteTeam"]').on("click", function(){
      $('#confirmDeleteTeam').attr('href','time/excluir/'+$(this).val());
    });

});
</script>

<link rel="stylesheet" href="<?php echo base_url('assets/datatables/css/datatables.bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/datatables/js/jquery.datatables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/datatables.bootstrap.min.js'); ?>"></script>

<div class="row">
  <div class="col-lg-12" style="padding: 20px;">
    <div class="table-responsive">
<table class="table table-hover table-striped" id="table_teams">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Opções</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($teams as $each_team){
        echo '<tr>';
          echo '<td>',$each_team->name,'</td>';
          echo '<td>',$each_team->description,'</td>';
          echo '<td>';
            echo '<a href="',base_url('time/editar/'.$each_team->id_team),'" data-placement="top" title="Editar" class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></a> ';
            echo '<button data-target="#deleteTeam" value="',$each_team->id_team,'" data-toggle="modal" data-placement="top" title="Excluir" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>';
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir Time</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">
          <strong>Você deseja excluir este time?
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="" id="confirmDeleteTeam" class="btn btn-block btn-lg btn-danger">Sim</a>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-block btn-lg btn-default" data-dismiss="modal">Não</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

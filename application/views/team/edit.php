<script src="<?php echo base_url('assets/js/upload_photo.js'); ?>"></script>

<form action="<?php echo base_url('time/atualizar/'.$team->id_team); ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-6">
      <div class="input-container">
        <input id="name" value="<?php echo $team->name; ?>" name="name" type="text" required>
        <label for="name">Name</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <textarea id="description" name="description" required><?php echo $team->description; ?></textarea><br>
        <label for="description">Descrição</label>
        <div class="bar"></div>
      </div>
    </div>

    <div class="col-lg-4 text-center">
      <div>
        <img alt="Logo do time" id="uploadPreview" width="150px" height="150px" src="<?php echo base_url('assets/img/teams/'.$team->logo); ?>" class="img-circle">
        <br><br>
        <a href="#" onclick="file_photo();" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-camera"></i> Foto</a>
      </div>

      <div class="hidden">
      	<input type="file" name="photo" onchange="PreviewImage();" id="uploadImage">
      </div>
    </div>

  </div>
  <br>
  <div class="button-container">
    <button><span>PRONTO</span></button>
  </div>
</form>

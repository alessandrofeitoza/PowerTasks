<form action="<?php echo base_url('etiqueta/atualizar/'.$tag->id_tag); ?>" method="post">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <label for="name">Titulo: </label>
      <input type="text" value="<?php echo $tag->name; ?>" id="name" name="name" placeholder="Nome da Etiqueta" class="form-control" required><br>

      <label for="color">Cor: </label>
      <select class="form-control" id="color" name="color" required>
        <option value="<?php echo $tag->color; ?>"><?php echo tag_label_color($tag->color); ?></option>
        <option value="default">Cinza</option>
        <option value="success">Verde</option>
        <option value="info" >Azul Claro</option>
        <option value="primary">Azul Escuro</option>
        <option value="danger" >Vermelho</option>
        <option value="warning">Amarelo</option>
      </select>
      <Br>

      <label for="description">Descrição: </label>
      <textarea name="description" id="description" placeholder="Descrição da Etiqueta" class="form-control" required><?php echo $tag->description; ?></textarea>

      <br>
      <button class="btn btn-block btn-lg btn-primary">ENVIAR</button>
    </div>
  </div>
</form>

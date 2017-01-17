<form action="<?php echo base_url('inserir'); ?>" method="post">
  <div class="row">
    <div class="col-lg-4">
      <label for="title">Titulo</label>
      <input type="text" name="title" placeholder="O que você vai fazer?" class="form-control" required><br>
    </div>
    <div class="col-lg-4">
      <label for="tag">Etiqueta</label>
      <select name="tag" id="tag" required class="form-control">
        <option> -- Selecione -- </option>
        <?php
          foreach($tags as $tag){
            echo '<option value="',$tag->id_tag,'">',$tag->name,'</option>';
          }
        ?>
      </select>
    </div>

    <div class="col-lg-4">
      <label for="priority">Prioridade</label>
      <select name="priority" required class="form-control">
        <option>Baixa</option>
        <option selected>Normal</option>
        <option>Alta</option>
      </select>
    </div>
  </div>

  <label for="description">Descrição</label>
  <textarea name="description" id="description" placeholder="Informe os detalhes" class="form-control" required></textarea>

  <br><br>

  <button class="btn btn-block btn-lg btn-primary">ENVIAR</button>
</form>

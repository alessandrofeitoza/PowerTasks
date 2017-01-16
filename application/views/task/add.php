<form action="<?php echo base_url('inserir'); ?>" method="post">
  <div class="row">
    <div class="col-lg-4">
      <label for="title">Titulo</label>
      <input type="text" name="title" placeholder="O que você vai fazer?" class="form-control" required><br>
    </div>
    <div class="col-lg-4">
      <label for="tag">Etiqueta</label>
      <select name="tag" required class="form-control">
        <option> -- Selecione -- </option>
        <?php

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

  <label for="desc">Descrição</label>
  <textarea name="desc" placeholder="Informe os detalhes" class="form-control" required></textarea>

  <br><br>

  <button class="btn btn-block btn-lg btn-primary">ENVIAR</button>
</form>

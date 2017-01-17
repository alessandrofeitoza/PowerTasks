<br>
<div class="row">
  <div class="col-lg-8 col-lg-offset-2">
    <form action="<?php echo base_url('atualizar/'.$task->id_task); ?>" method="post">
      <div class="row">
        <div class="col-lg-4">
          <label for="title">Titulo</label>
          <input type="text" value="<?php echo $task->title; ?>" name="title" placeholder="O que você vai fazer?" class="form-control" required><br>
        </div>
        <div class="col-lg-4">
          <label for="tag">Etiqueta</label>
          <select name="tag" id="tag" required class="form-control">
            <option> -- Selecione -- </option>
            <?php
              echo '<option selected value="',$task->tag_id,'">',$task->name,'</option>';
              foreach($tags as $tag){
                echo '<option value="',$tag->id_tag,'">',$tag->name,'</option>';
              }
            ?>
          </select>
        </div>

        <div class="col-lg-4">
          <label for="priority">Prioridade</label>
          <select name="priority" required class="form-control">
            <?php echo '<option selected>',$task->priority,'</option>'; ?>
            <option>Baixa</option>
            <option>Normal</option>
            <option>Alta</option>
          </select>
        </div>
      </div>

      <label for="description">Descrição</label>
      <textarea name="description" id="description" placeholder="Informe os detalhes" class="form-control" required><?php echo $task->description; ?></textarea>

      <br><br>

      <button class="btn btn-block btn-lg btn-primary">ATUALIZAR</button>
    </form>
  </div>
</div>

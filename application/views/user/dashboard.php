<div class="row">
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-red">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-exclamation-triangle fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge"><?php echo count($myTasksToDo); ?></div>
                      <div>Tarefas a concluir!</div>
                  </div>
              </div>
          </div>
          <a href="<?php echo base_url('tarefas'); ?>">
              <div class="panel-footer">
                  <span class="pull-left">Ver Detalhes</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-primary">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge"><?php echo count($myTeams); ?></div>
                      <div>Meus Times!</div>
                  </div>
              </div>
          </div>
          <a href="<?php echo base_url('times'); ?>">
              <div class="panel-footer">
                  <span class="pull-left">Ver Detalhes</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-green">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge"><?php echo count($myTasksDone); ?></div>
                      <div>Tarefas Concluídas!</div>
                  </div>
              </div>
          </div>
          <a href="<?php echo base_url('tarefas/#done'); ?>">
              <div class="panel-footer">
                  <span class="pull-left">Ver Detalhes</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
  <div class="col-lg-3 col-md-6">
      <div class="panel panel-yellow">
          <div class="panel-heading">
              <div class="row">
                  <div class="col-xs-3">
                      <i class="fa fa-tags fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                      <div class="huge"><?php echo count($myTags) ?></div>
                      <div>Etiquetas!</div>
                  </div>
              </div>
          </div>
          <a href="<?php echo base_url('tarefas#tags'); ?>">
              <div class="panel-footer">
                  <span class="pull-left">Ver Detalhes</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
              </div>
          </a>
      </div>
  </div>
</div>
<!-- /.row -->

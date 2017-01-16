<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <div class="profile">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
    				<div class="profile-userpic">
    					<img src="<?php echo base_url('assets/img/users/'.$user->photo); ?>" class="img-responsive" alt="">
    				</div>
    				<!-- END SIDEBAR USERPIC -->
    				<!-- SIDEBAR USER TITLE -->
    				<div class="profile-usertitle">
    					<div class="profile-usertitle-name">
    						<?php echo $user->name; ?>
    					</div>
    					<div class="profile-usertitle-job">
    						<!-- Developer -->
    					</div>
    				</div>
          </div>
        </div>
        <br><br>
        <ul class="nav" id="side-menu">
            <li>
                <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url('tarefas'); ?>"><i class="fa fa-tasks fa-fw"></i> Minhas Tarefas</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-group fa-fw"></i> Times<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo base_url('times'); ?>">Meus Times</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('time/novo'); ?>">Novo Time</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

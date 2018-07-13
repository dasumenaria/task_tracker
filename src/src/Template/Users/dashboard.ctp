<div class="row">
	<div class="col-md-12">
        <div class="col-md-3">
            <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $MasterClientsCount;?> </h3>
              <p>Clients</p>
            </div>
            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
            <a href="<?php echo $this->Url->build(array('controller'=>'MasterClients','action'=>'index')) ?>" class="small-box-footer">View</a>
          </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $ProjectsCount;?> </h3>
              <p>Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="<?php echo $this->Url->build(array('controller'=>'Projects','action'=>'index')) ?>" class="small-box-footer">View</a>
          </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $UsersCount;?></h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo $this->Url->build(array('controller'=>'Users','action'=>'index')) ?>" class="small-box-footer">View</a>
          </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $TasksCount;?></h3>
              <p>Tasks</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'index')) ?>" class="small-box-footer">View</a>
          </div>
        </div>
    </div>
</div>
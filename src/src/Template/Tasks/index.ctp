<style type="text/css">
    .row{
        margin-bottom: 15px;
    }    

    .panel-default>.panel-heading{
        background-color: #2391c3;
        color: #fff;
        padding: 1px 10px;
    }

    .panel-default>.panel-heading>.panel-title>a{
        display: block;
        padding: 8px;
    }
    .actions
    {
        width: 100px;
    }
    .box-body>.table {
        margin-bottom: 20px;
    }
    input[type=radio] 
    {
        margin: 4px 0 0 0;
        width: 16px;
        height: 16px;
    }
    .radio-list > label.radio-inline {
    display: inline-block;
    }

    .radio-inline, .checkbox-inline {
        display: inline-block;
        padding-left: 20px;
        margin-bottom: 0;
        font-weight: 400;
        font-size: 14px;
        vertical-align: middle;
        cursor: pointer;
    }
</style>

<section class="content">

<div id="emailmodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" >
        <form method="post" id="email_form" action="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'index')) ?>">
            <div class="modal-content">
              <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                    Are you sure you want to send email?
                    </h4>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="send_email" class="btn btn-sm btn-info">Yes</button>
                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Task Report </b>
                <div class="box-tools pull-right">
                    <a style="font-size:19px;  margin-top: -6px;" class="btn btn-box-tool" data-target="#myModal122" data-toggle="collapse"> <i class="fa fa-filter"></i></a>
                </div>
 			</div>
			<div class="box-body" style="overflow-x:scroll">
                <form method="get" class="loadingshow">
                    <div class="collapse"  id="myModal122" aria-expanded="false"> 
                        <fieldset style="text-align:left;"><legend>Filter</legend>
                            <div class="col-md-12">
                                <div class="row"> 
                                    <div class="col-md-4">
                                        <label class="control-label">Select Project</label>
                                        <?= $this->Form->control('project_id',['empty'=>'---All---','options'=>$projects,'class'=>'form-control input-sm select2','label'=>false,'value'=>@$_GET['project_id']]) ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">Select User</label>
                                        <?= $this->Form->control('user_id',['empty'=>'---All---','options'=>$users,'class'=>'form-control input-sm select2','label'=>false,'value'=>@$_GET['user_id']]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Select Status</label>
                                        <select name="status" class="form-control input-sm select2">
                                            <option value="">---All---</option>
                                            <option value="3">Incomplete</option>
                                            <option value="1">Completed</option>
                                            <option value="2">Overdue</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="radio-list col-md-4">
                                        <label><h5>By Date: &nbsp;</h5></label>
                                        <label class="radio-inline">
                                        <input type="radio" name="date_filter" id="policy" value="completion" checked> Completion Date </label>

                                        <label class="radio-inline">
                                        <input type="radio" name="date_filter" id="expiry" value="created"> Created Date </label>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <input type="text" class="form-control datepickers" data-date-format="dd-mm-yyyy" name="date_from" id="date_from" placeholder="From">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" class="form-control datepickers" data-date-format="dd-mm-yyyy" name="date_to" id="date_to" placeholder="To">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <hr style="margin-top: 12px;margin-bottom: 10px;"></hr>
                                        <?php echo $this->Form->button('Apply',['class'=>'btn btn-sm btn-success','id'=>'submit_member','name'=>'search_report']); ?>

                                        <a class="btn btn-sm btn-primary" id="email_button">Send Email</a>

                                    </div> 
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form> 
            	<div class="panel-group" id="accordion">
                <?php if(!empty($data)): ?>		
                <?php $j=0; foreach ($data as $project): $k = 0; $j++;
                    if(!empty($project->tasks)):
                    ?>

                    <div class="panel panel-default">
                        <div class="panel-heading user">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $j ?>"><?= $project['title']?></a>
                            </h4>
                        </div>
                        <div id="collapse<?= $j ?>" class="panel-collapse collapse <?=($j==1?'in':'')?>">
                            <div class="panel-body">
                                <table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
                                    <tbody>
                                        <tr>
                                            <th> Sr. No. </th>
                                            <th class="text-center" style="width: 48%;"> Task </th>
                                            <th> Team </th>
                                            <th> created_on </th>
                                            <th> Completion Date </th>
                                            <th> completed_on </th>  
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                        <?php foreach ($project['tasks'] as $task): $k++;

                                            if($task->status==1){$color="#c5eacf";}else{$color='';}
                                            ?>

                                            <tr style="background-color: <?= $color?>;">
                                                <td><?= $this->Number->format($k) ?></td>
                                                <td><?= $task['title'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Team
                                                      <span class="caret"></span></button>
                                                      <ul class="dropdown-menu">
                                                        <?php foreach ($task['task_members'] as $user) { echo "<li class='active'><a>".$user->user->name."</a></li>"; } ?>
                                                      </ul>
                                                    </div> 
                                                </td>
                                                <td><?= date('d/M',strtotime($task['created_on'])) ?></td>
                                                <td><?= date('d/M',strtotime($task['deadline'])) ?></td>
                                                <td><?= (($task['status']==1)?date('d/M',strtotime($task['completed_on'])):'') ?></td>
                                                <td class="actions"> 
                                                    <?php if($task->status!=1)
                                                    {
                                                        echo $this->Html->link(('<i class="fa fa-edit"></i>'), ['action' => 'edit', $task['id'],str_replace('%','-',urlencode($this->Url->build('', true)))],['escape'=>false,'class'=>'btn btn-xs btn-info'])?>
                                                
                                                        <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                                    <?php } else {?>    
                                                        <a class=" btn btn-successto btn-xs" data-target="#undi<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-reply"></i></a>
                                                    <?php }?>

                                                    <?php if(!empty($task['task_statuses'])){ ?>
                                                    <a class=" btn btn-info btn-xs" data-target="#Details<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-book"></i></a>
                                                    <?php } ?>
                                                    
                                                    <div id="deletemodal<?php echo $task->id; ?>" class="modal fade" role="dialog">
                                                        <div class="modal-dialog modal-md" >
                                                            <form method="post" action="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'delete',$task->id,str_replace('%','-',urlencode($this->Url->build('', true))))) ?>">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">
                                                                        Are you sure you want to remove this Task?
                                                                        </h4>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn  btn-sm btn-info">Yes</button>
                                                                        <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php   foreach ($project['tasks'] as $task): ?>
                        <div id="Details<?php echo $task->id;?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Task Status Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="background-color:#DFD9C4;">
                                                    <th scope="col">Sr.No.</th> 
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Completion Date</th>
                                                    <th scope="col">Created On</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $xss=0; foreach ($task->task_statuses as $Taskech): ?>
                                                <?php $xss++; ?>
                                                <tr>
                                                    <td><?php echo $xss;?></td>
                                                    <td><?= h($Taskech->user->name) ?></td>
                                                    <td><?= h(date('d-M',strtotime($Taskech->deadline))) ?></td>
                                                    <td><?= h(date('d-M',strtotime($Taskech->created_on))) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer" style="height:60px;">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <input type="submit" class="btn btn-info btn-sm" data-dismiss="modal" Value="Cancel"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="undi<?php echo $task->id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md" >
                                <form method="post" action="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'undodelete',$task->id),str_replace('%','-',urlencode($this->Url->build('', true)))) ?>">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">
                                            Are you sure you want to undo this Task?
                                            </h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn  btn-sm btn-info">Yes</button>
                                            <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                <?php endif; ?>
                <?php endforeach; ?>
                <?php else: echo "No Data Found"; ?>
                <?php endif; ?>   
                </div>

            </div>
        </div>
    </div>
</div>

 <?php 
 $js = '
    $("#email_button").click(function(){
            var project_id = $("#project-id").find(":selected").val();
            $("#email_form").attr("action","/task_tractor/tasks?project_id="+project_id+"&send_email=1");
            $("#emailmodal").modal("toggle");
        });
 ';
 echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>

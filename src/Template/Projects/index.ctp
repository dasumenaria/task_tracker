<style type="text/css">
    .row{
        margin-bottom: 15px;
    }    

    .user{
        background-color: #2391c3;
        color: #fff;
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
        font-size: 16px;
        vertical-align: middle;
        cursor: pointer;
    }
</style>

<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Project Report </b>
                <div class="box-tools pull-right">
                    <a style="font-size:19px;  margin-top: -6px;" class="btn btn-box-tool" data-target="#myModal122" data-toggle="collapse"> <i class="fa fa-filter"></i></a>
                </div>
 			</div>
			<div class="box-body" style="overflow-x:scroll">
                <form method="post" class="loadingshow">
                    <div class="collapse"  id="myModal122" aria-expanded="false"> 
                        <fieldset style="text-align:left;"><legend>Filter</legend>
                            <div class="col-md-12">
                                <div class="row"> 
                                    <div class="col-md-4">
                                        <label class="control-label">Select Client</label>
                                        <?= $this->Form->control('client_id',['empty'=>'---All---','options'=>$clients,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">Select User</label>
                                        <?= $this->Form->control('user_id',['empty'=>'---All---','options'=>$users,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Select Status</label>
                                        <select name="status" class="form-control input-sm select2">
                                            <option value="">---All---</option>
                                            <option value="2">Incomplete</option>
                                            <option value="1">Completed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="radio-list col-md-4">
                                        <label><h4>By Date: &nbsp;</h4></label>
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
                                    </div> 
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form> 
            			
                <?php foreach ($data as $client): $k = 0;
                    if(!empty($client->projects)):
                    ?>

                    <table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
                        <tbody>
                            <tr class="user">
                                <th colspan="8"><?= $client['client_name']?></th>
                            </tr>
                            <tr>
                                    <th> Sr. No. </th>
                                    <th> Project </th>
                                    <th> Team </th>
                                    <th> POC Member </th>
                                    <th> created_on </th>
                                    <th> Completion Date </th>
                                    <th> completed_on </th>  
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            <?php foreach ($client['projects'] as $project): $k++;

                                if($project->completed_status==1){$color="#c5eacf";}else{$color='';}
                                ?>

                                <tr style="background-color: <?= $color?>;">
                                    <td><?= $this->Number->format($k) ?></td>
                                    <td><?= $project['title'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Team
                                          <span class="caret"></span></button>
                                          <ul class="dropdown-menu">
                                            <?php foreach ($project['project_members'] as $user) { echo "<li class='active'><a>".$user->user->name."</a></li>"; } ?>
                                          </ul>
                                        </div> 
                                    </td>
                                    <td><?= $project['user']['name'] ?></td>
                                    <td><?= date('d/M',strtotime($project['created_on'])) ?></td>
                                    <td><?= date('d/M',strtotime($project['deadline'])) ?></td>
                                    <td><?= (($project['completed_status']==1)?date('d/M',strtotime($project['completed_date'])):'') ?></td>
                                    <td class="actions"> 
                                        <?php if($project->completed_status!=1)
                                        {
                                            echo $this->Html->link('<i class="fa fa-edit"></i>','/projects/edit/'.$project->id,array('escape'=>false,'class'=>'btn btn-success btn-xs'));?>
                                    
                                            <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $project->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                        <?php } else {?>    
                                            <a class=" btn btn-successto btn-xs" data-target="#undi<?php echo $project->id; ?>" data-toggle=modal><i class="fa fa-reply"></i></a>
                                        <?php }?>

                                        <?php if(!empty($project['project_statuses'])){ ?>
                                        <a class=" btn btn-info btn-xs" data-target="#Details<?php echo $project->id; ?>" data-toggle=modal><i class="fa fa-book"></i></a>
                                        <?php } ?>
                                        
                                        <div id="deletemodal<?php echo $project->id; ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-md" >
                                                <form method="post" action="<?php echo $this->Url->build(array('controller'=>'projects','action'=>'delete',$project->id)) ?>">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">
                                                            Are you sure you want to remove this project?
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

                    <?php   foreach ($client['projects'] as $project): ?>
                        <div id="Details<?php echo $project->id;?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">project Status Details</h4>
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
                                                <?php $xss=0; foreach ($project->project_statuses as $projectech): ?>
                                                <?php $xss++; ?>
                                                <tr>
                                                    <td><?php echo $xss;?></td>
                                                    <td><?= h($projectech->project->title) ?></td>
                                                    <td><?= h(date('d-M',strtotime($projectech->deadline))) ?></td>
                                                    <td><?= h(date('d-M',strtotime($projectech->created_on))) ?></td>
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
                        <div id="undi<?php echo $project->id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-md" >
                                <form method="post" action="<?php echo $this->Url->build(array('controller'=>'projects','action'=>'undodelete',$project->id)) ?>">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">
                                            Are you sure you want to undo this project?
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


            </div>
        </div>
    </div>
</div>

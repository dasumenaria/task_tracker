<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Project Details </b>
 			</div>
			<div class="box-body" style="overflow-x:scroll"> 
				<fieldset><legend><?= h($project->title) ?></legend>
					<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
						<tr>
							<th scope="row"><?= __('Client Name') ?></th>
							<td><?= $project->has('master_client') ? $this->Html->link($project->master_client->client_name, ['controller' => 'MasterClients', 'action' => 'index', $project->master_client->id]) : '' ?></td>
					   
							<th scope="row"><?= __('Project Point of Contact') ?></th>
							<td><?= $project->has('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'index', $project->user->id]) : '' ?></td>
						</tr>
						<tr>
							<th scope="row"><?= __('Project Name') ?></th>
							<td><?= h($project->title) ?></td>
							<th scope="row"><?= __('Complition Date') ?></th>
							<td><?= h(date('d-M-Y',strtotime($project->deadline))) ?></td>
						</tr>
						<tr>
							<th scope="row"><?= __('Created On') ?></th>
							<td><?= h(date('d-M-Y',strtotime($project->created_on))) ?></td>
						</tr>
					</table>
				<fieldset>  <legend><?= __('Project Members') ?></legend>
					<div class="Project">
						<table class="table table-bordered" cellpadding="0" cellspacing="0">
							<tr>
								<th scope="col"><?= __('S.No') ?></th>
								<th scope="col"><?= __('Project Name') ?></th>
								<th scope="col"><?= __('User') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
							<?php if (!empty($project->project_members)){ ?>
							<?php foreach ($project->project_members as $projectMembers): ?>
							<tr>
								<td><?= h($projectMembers->id) ?></td>
								<td><?= h($project->title) ?></td>
								<td><?= h($projectMembers->user->name) ?></td>
								<td class="actions">
									<?php $this->Form->postLink(__('Delete'), ['controller' => 'ProjectMembers', 'action' => 'delete', $projectMembers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMembers->id)]) ?>
									<a class=" btn btn-danger btn-xs" data-target="#deletemodalMenarf<?php echo $projectMembers->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
										
									<div id="deletemodalMenarf<?php echo $projectMembers->id; ?>" class="modal fade" role="dialog">
										<div class="modal-dialog modal-md" >
											<form method="post" action="<?php echo $this->Url->build(array('controller'=>'ProjectMembers','action'=>'delete',$projectMembers->id)) ?>">
												<div class="modal-content">
												  <div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">
														Are you sure you want to remove this Members?
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
							<?php } else{ ?>
							<tr><td align="center" colspan="10"> No record found</td></tr>
							<?php }?>
						</table>
					</div>
				</fieldset>
				<fieldset><legend><?= __('Project Statuses') ?></legend>
					<div class="Project">
						<table class="table table-bordered" cellpadding="0" cellspacing="0">
							<tr>
								<th scope="col"><?= __('S.No.') ?></th>
								<th scope="col"><?= __('Project Name') ?></th>
								<th scope="col"><?= __('Deadline') ?></th>
								<th scope="col"><?= __('Created On') ?></th> 
							</tr>
							<?php $v=0; if (!empty($project->project_statuses)){ ?>
							<?php foreach ($project->project_statuses as $projectStatuses): ?>
							<tr>
								<td><?= h(++$v) ?></td>
								<td><?= h($project->title) ?></td>
								<td><?= h(date('d-M-Y',strtotime($projectStatuses->deadline))) ?></td>
								<td><?= h(date('d-M-Y',strtotime($projectStatuses->created_on))) ?></td>
							</tr>
							<?php endforeach; ?>
							<?php } else{ ?>
							<tr><td align="center" colspan="10"> No record found</td></tr>
							<?php }?>
						</table>
					   
					</div>
				</fieldset>
				<fieldset><legend><?= __('Project Tasks') ?></legend>
					<div class="Project">
						<table class="table table-bordered" cellpadding="0" cellspacing="0" id="fixed_hdr1">
							<thead>
								<tr>
	                                <th> Sr. No. </th>
	                                <th class="text-center" style="width: 50%;"> Task </th>
	                                <th> Team </th>
	                                <th> created_on </th>
	                                <th> Completion Date </th>
	                                <th> completed_on </th>  
	                                <th class="actions"><?= __('Actions') ?></th>
	                            </tr>
							</thead>
							<tbody>
							<?php $X=0;  if (!empty($project->tasks)){ ?>
								<?php foreach ($project['tasks'] as $task): $X++;

                                    if($task->status==1){$color="#c5eacf";}else{$color='';}
                                    ?>

                                    <tr style="background-color: <?= $color?>;">
                                        <td><?= $this->Number->format($X) ?></td>
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
                                                echo $this->Html->link('<i class="fa fa-edit"></i>','/Tasks/edit/'.$task->id,array('escape'=>false,'class'=>'btn btn-success btn-xs'));?>
                                        
                                                <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                            <?php } else {?>    
                                                <a class=" btn btn-successto btn-xs" data-target="#undi<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-reply"></i></a>
                                            <?php }?>

                                            <?php if(!empty($task['task_statuses'])){ ?>
                                            <a class=" btn btn-info btn-xs" data-target="#Details<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-book"></i></a>
                                            <?php } ?>
                                            
                                            <div id="deletemodal<?php echo $task->id; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-md" >
                                                    <form method="post" action="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'delete',$task->id)) ?>">
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
								<?php } else{ ?>
								<tr><td align="center" colspan="10"> No record found</td></tr>
								<?php }?>
							</tbody>
						</table>

						<table class="table table-bordered" cellpadding="0" cellspacing="0" id="fixed_hdr1">
							<tr>
								<td class="text-center">
									<?= $this->Html->link('Add Task',['controller' => 'Tasks', 'action' => 'add',$id,'_full' => true],['class'=>'btn btn-default btn-success btn-lg']); ?>
								</td>
							</tr>
						</table>
					   
					</div>
				</fieldset>
				</fieldset>
			</div>
		</div>
	</div>
</div>

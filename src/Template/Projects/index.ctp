<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Project lists </b>
 			</div>
			<div class="box-body" style="overflow-x:scroll"> 
			<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
				<thead>
					<tr>
						<th scope="col"><?= ('S. No.') ?></th>
						<th scope="col"><?= ('Client') ?></th>
						<th scope="col"><?= ('POC') ?></th>
						<th scope="col"><?= $this->Paginator->sort('title') ?></th>
						<th scope="col"><?= $this->Paginator->sort('deadline') ?></th> 
						<th scope="col"><?= $this->Paginator->sort('created_on') ?></th> 
						<th scope="col" class="actions"><?= __('Members | Tasks') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $x=0; foreach ($projects as $project): ?>
					<tr>
						<td><?= ++$x; ?></td>
						<td><?= $project->has('master_client') ? $this->Html->link($project->master_client->client_name, ['controller' => 'MasterClients', 'action' => 'index', $project->master_client->id]) : '' ?></td>
						<td><?= $project->has('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'index', $project->user->id]) : '' ?></td>
						<td><?= h($project->title) ?></td>
						<td><?= h(date('d-m-Y',strtotime($project->deadline))) ?></td> 
						<td><?= h(date('d-m-Y',strtotime($project->created_on))) ?></td> 
						<td>
						<a class="btn btn-xs btn-info" data-target="#ProjectMembers<?php echo $project->id;?>" data-toggle="modal"> Member's</a>
						
						<div id="ProjectMembers<?php echo $project->id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Project Member's List of <?php echo $project->title;?></h4>
								  </div>
								<div class="modal-body">
									<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
										<thead>
											<tr style="background-color:#DFD9C4;">
												<th scope="col">Sr.No.</th>
												<th scope="col">Name</th>
												<th scope="col">Email</th>
												<th scope="col">Mobile No.</th>
											</tr>
										</thead>
										<tbody>
											<?php  $xd=0; foreach ($project->project_members as $master_client_pocs): ?>
											<?php $xd++; ?>
											<tr>
												<td><?php echo $xd;?></td>
												<td><?= h($master_client_pocs->user->name) ?></td>
												<td><?= h($master_client_pocs->user->email) ?></td>
												<td><?= h($master_client_pocs->user->mobile) ?></td>
 											</tr>
											<?php endforeach;?>
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
						|
						<a class="btn btn-xs btn-info" data-target="#TaskList<?php echo $project->id;?>" data-toggle="modal">Task's </a>
						
						<div id="TaskList<?php echo $project->id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Task's List of <?php echo $project->title;?></h4>
								  </div>
								<div class="modal-body">
									<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
										<thead>
											<tr style="background-color:#DFD9C4;">
												<th scope="col">Sr.No.</th>
												<th scope="col">Title</th>
												<th scope="col">Deadline</th>
												<th scope="col">Name</th>
												<th scope="col">Email</th>
												<th scope="col">Mobile No.</th>
											</tr>
										</thead>
										<tbody>
											<?php $x=0; foreach ($project->tasks as $TaskList): ?>
											<?php $x++; ?>
											<tr>
												<td><?php echo $x;?></td>
												<td><?= h($TaskList->title) ?></td>
												<td><?= h(date('d-m-Y',strtotime($TaskList->deadline))) ?></td>
												<td><?= h($TaskList->user->name) ?></td>
												<td><?= h($TaskList->user->email) ?></td>
												<td><?= h($TaskList->user->mobile_no) ?></td>
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
						
						</td> 
						<td class="actions">
							<?php $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
							<?php $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
							<?php $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
							<?php echo $this->Html->link('<i class="fa fa-edit"></i>','/Projects/edit/'.$project->id,array('escape'=>false,'class'=>'btn btn-success btn-xs'));?>
							
							<a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $project->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
							<div id="deletemodal<?php echo $project->id; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md" >
									<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Projects','action'=>'delete',$project->id)) ?>">
										<div class="modal-content">
										  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">
												Are you sure you want to remove this Project?
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
			<div class="paginator">
				<ul class="pagination">
					<?= $this->Paginator->first('<< ' . __('first')) ?>
					<?= $this->Paginator->prev('< ' . __('previous')) ?>
					<?= $this->Paginator->numbers() ?>
					<?= $this->Paginator->next(__('next') . ' >') ?>
					<?= $this->Paginator->last(__('last') . ' >>') ?>
				</ul>
				<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
			</div>
		</div>
	</div>
</div>
</div>

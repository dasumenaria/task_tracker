

<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>User Lists </b>
 			</div>
			<div class="box-body" style="overflow-x:scroll"> 
				<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('email') ?></th>
							<th scope="col"><?= $this->Paginator->sort('mobile_no') ?></th>
							<th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th> 
							<th scope="col"><?= ('Project List') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $xs=0; foreach ($users as $user): ?>
						<?php $xs++; ?>
						<tr>
							<td><?= $xs; ?></td>
							<td><?= h($user->name) ?></td>
							<td><?= h($user->email) ?></td>
							<td><?= h($user->mobile_no) ?></td>
							<td><?= h(date('d-m-Y',strtotime($user->date_of_birth))) ?></td> 
							<td><a class="btn btn-xs btn-success" data-target="#ProjectList<?php echo $user->id;?>" data-toggle="modal">Project's</a>
							<div id="ProjectList<?php echo $user->id;?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Project List of <?= h(ucwords($user->name)) ?> </h4>
										</div>
										<div class="modal-body">
											<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
												<thead>
													<tr style="background-color:#DFD9C4;">
														<th scope="col">Sr. No.</th>
														<th scope="col">Project Name</th>
														<th scope="col">Deadline</th>  
													</tr>
												</thead>
												<tbody>
													<?php $x=0; foreach ($user->project_members as $projects): ?>
													<?php $x++; ?>
														<tr>
															<td><?php echo $x;?></td>
															<td>
															<?= $projects->has('project') ? $this->Html->link($projects->project->title, ['controller' => 'Projects', 'action' => 'view', $projects->project->id]) : '' ?></td>
															<td><?= h(date('d-m-Y',strtotime($projects->project->deadline))) ?></td>  
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
							<?php echo $this->Html->link('<i class="fa fa-edit"></i>','/Users/edit/'.$user->id,array('escape'=>false,'class'=>'btn btn-info btn-xs'));?>
							
							<a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $user->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
							<div id="deletemodal<?php echo $user->id; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md" >
									<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Users','action'=>'delete',$user->id)) ?>">
										<div class="modal-content">
										  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">
													Are you sure you want to remove this User?
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
							
							<?php $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
							
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

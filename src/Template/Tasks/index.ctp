<?php  echo $this->Html->script('/assets/scroll/jquery/jquery-1.10.2.min.js'); ?>
<script>
	$(function () {  
		$('#fixed_hdr1').fxdHdrCol({
			fixedCols: 3,
			width:     '100%',
			height:    400,
			colModal: [
			   { width: 50, align: 'center' },
			   { width: 120, align: 'center' },
			   { width: 200, align: 'left' },
			   { width: 400, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 150, align: 'left' },
			   { width: 100, align: 'left' },
			   { width: 80, align: 'left' }, 
			]					
		});	
	});
</script>

<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Task lists </b>
 			</div>
			<div class="box-body dwrapper" style="overflow-x:scroll" id="da"> 
				<table class="table table-bordered" cellpadding="0" cellspacing="0" id="fixed_hdr1">
					<thead>
						<tr>
							<th scope="col"><?= ('id') ?></th>
							<th scope="col"><?= ('User') ?></th>
							<th scope="col"><?= ('project') ?></th> 
							<th width="400px" scope="col"><?= ('Task') ?></th>
							<th scope="col"><?= ('deadline') ?></th> 
							<th scope="col"><?= ('created_on') ?></th>
							<th scope="col"><?= ('completed_on') ?></th>  
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $X=0; foreach ($tasks as $task): ?>
						<?php $X++; //pr($tasks); exit;
						$color='';
						if($task->status==1){$color="#c5eacf";}
						?>
						
						<tr style="background-color:<?php echo $color;?>">
							<td><?= $X; ?></td>
							<td><?= $task->user->name ?></td>
							<td><?= $task->has('project') ? $this->Html->link($task->project->title, ['controller' => 'Projects', 'action' => 'view/'.$task->project->id]) : '' ?></td>
							<td  width="400px"><?= $task->title ?></td>
							<td><?= h(date('d-M-Y',strtotime($task->deadline))) ?></td> 
							<td><?= h(date('d-M-Y',strtotime($task->created_on))) ?></td>
							<td><?php if($task->status==1){ echo date('d-M-Y',strtotime($task->completed_on));} ?></td> 
							<td class="actions"> 
								<?php $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
								<?php $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
								<?php if($task->status!=1){  echo $this->Html->link('<i class="fa fa-edit"></i>','/Tasks/edit/'.$task->id,array('escape'=>false,'class'=>'btn btn-success btn-xs'));?>
							
								<a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
								<?php } else {?>	
								<a class=" btn btn-successto btn-xs" data-target="#undi<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-reply"></i></a>
								<?php }?>
								<a class=" btn btn-info btn-xs" data-target="#Details<?php echo $task->id; ?>" data-toggle=modal><i class="fa fa-book"></i></a>
								
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
			<?php   foreach ($tasks as $task): ?>
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
										<th scope="col">Deadline</th>
										<th scope="col">Created On</th> 
									</tr>
								</thead>
								<tbody>
									<?php $xss=0; foreach ($task->task_statuses as $Taskech): ?>
									<?php $xss++; ?>
									<tr>
										<td><?php echo $xss;?></td>
										<td><?= h($Taskech->user->name) ?></td>
										<td><?= h(date('d-m-Y',strtotime($Taskech->deadline))) ?></td>
										<td><?= h(date('d-m-Y',strtotime($Taskech->created_on))) ?></td>
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
					<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Tasks','action'=>'undodelete',$task->id)) ?>">
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
	</div>
</div>

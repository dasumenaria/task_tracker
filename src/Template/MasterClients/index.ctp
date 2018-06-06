<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Client lists </b>
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
							<div class="col-md-12">
								<label class="control-label">City</label>
								<?php echo $this->Form->input('cityid',[
								'label' => false,'class'=>'form-control ','placeholder'=>'Enter City Name']);?>
							</div>
							<div class="col-md-12">
								<label class="control-label">Select State</label>
								<?php echo $this->Form->input('cityid',[
								'label' => false,'class'=>'form-control ','placeholder'=>'Enter City Name']);?> 
							</div>
							<div class="col-md-12" align="center">
							<hr style="margin-top: 12px;margin-bottom: 10px;"></hr>
								<a href="<?php echo $this->Url->build(array('controller'=>'Cities','action'=>'add')) ?>"class="btn btn-danger btn-sm">Reset</a>
								<?php echo $this->Form->button('Apply',['class'=>'btn btn-sm btn-success','id'=>'submit_member','name'=>'search_report']); ?>
							</div> 
						</div>
					</div>
				</fieldset>
			</div>
			</form>			
			<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
				<thead>
					<tr>
						<th scope="col"><?= ('S. No.') ?></th>
						<th scope="col"><?= $this->Paginator->sort('client_name') ?></th> 
						<th scope="col"><?= ('Contact Persons') ?></th>
						<th scope="col"><?= ('Project List') ?></th>
						<th scope="col" class="actions"><?= __('Actions') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php $sno=0; foreach ($masterClients as $masterClient): ?>
					<?php $sno++; //pr($masterClient); exit;?>
					 
					<tr>
						<td><?= $sno ?></td>
						<td><?= h($masterClient->client_name) ?></td> 
						<td><a class="btn btn-xs btn-info" data-target="#AcDetails<?php echo $masterClient->id;?>" data-toggle="modal">Contact Person's</a>
						<div id="AcDetails<?php echo $masterClient->id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Contact Person's</h4>
								  </div>
								<div class="modal-body">
									<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
										<thead>
											<tr style="background-color:#DFD9C4;">
												<th scope="col">Sr.No.</th>
												<th scope="col">Name</th>
												<th scope="col">Email</th>
												<th scope="col">Mobile No.</th>
												<th scope="col" class="actions"><?= __('Actions') ?></th>
											</tr>
										</thead>
										<tbody>
											<?php $x=0; foreach ($masterClient->master_client_pocs as $master_client_pocs): ?>
											<?php $x++; ?>
											<tr>
												<td><?php echo $x;?></td>
												<td><?= h($master_client_pocs->contact_person_name) ?></td>
												<td><?= h($master_client_pocs->email) ?></td>
												<td><?= h($master_client_pocs->mobile) ?></td>
												<td><?= $this->Form->postLink(__('Delete'), ['action' => '../MasterClientPocs/delete', $master_client_pocs->id], ['class'=>'btn btn-danger btn-xs','confirm' => __('Are you sure you want to delete')]) ?></td>
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
						<td><a class="btn btn-xs btn-info" data-target="#ProjectList<?php echo $masterClient->id;?>" data-toggle="modal">Project's</a>
						<div id="ProjectList<?php echo $masterClient->id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog modal-md">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Project List</h4>
									</div>
									<div class="modal-body">
										<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
											<thead>
												<tr style="background-color:#DFD9C4;">
													<!--<th scope="col">Sr.No.</th>-->
													<th scope="col">Project Name</th>
													<th scope="col">Deadline</th>
													<th scope="col">Project POC</th>
													<th scope="col">POC Mobile</th> 
												</tr>
											</thead>
											<tbody>
												<?php $x=0; foreach ($masterClient->projects as $projects): ?>
												<?php $x++; ?>
												<tr>
													<!--<td><?php echo $x;?></td>-->
													<td>
													<?= $projects->has('user') ? $this->Html->link($projects->title, ['controller' => 'Projects', 'action' => 'view', $projects->id]) : '' ?>
													
													 <td><?= h(date('d-m-Y',strtotime($projects->deadline))) ?></td>
													<td> 
													<?= h($projects->user->name) ?>
													</td>
													<td><?= h($projects->user->mobile_no) ?></td> 
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
							<?php echo $this->Html->link('<i class="fa fa-edit"></i>','/MasterClients/edit/'.$masterClient->id,array('escape'=>false,'class'=>'btn btn-success btn-xs'));?>
							
							<a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $masterClient->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
							<div id="deletemodal<?php echo $masterClient->id; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md" >
									<form method="post" action="<?php echo $this->Url->build(array('controller'=>'MasterClients','action'=>'delete',$masterClient->id)) ?>">
										<div class="modal-content">
										  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">
												Are you sure you want to remove this Client?
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
							
							<?php $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterClient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClient->id)]) ?>
							
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

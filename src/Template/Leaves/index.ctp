<style type="text/css">
    .row{
        margin-bottom: 15px;
    }    
</style>

<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Project </b>
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
                                        <label class="control-label">By User</label>
                                        <?= $this->Form->control('user_id',['empty'=>'---Select---','options'=>$users,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">By Leave Type</label>
                                        <?= $this->Form->control('leave_type_id',['empty'=>'---Select---','options'=>$leaveTypes,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">By Leave Status</label>
                                        <select name="leave_status" class="form-control input-sm select2">
                                            <option value="">---select---</option>
                                            <option value="3">Panding</option>
                                            <option value="1">Approve</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 text-right"><h4>By Date:</h4></div>
                                    
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
                                        <a href="<?php echo $this->Url->build(array('controller'=>'Leaves','action'=>'index')) ?>"class="btn btn-danger btn-sm">Reset</a>

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
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('leave_type_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('date_from') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('date_to') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('leave_reason') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('leave_status') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 0; foreach ($leaves as $leave): $k++?>
                        <tr>
                            <td><?= $this->Number->format($k) ?></td>
                            <td><?= $leave->user->name ?></td>
                            <td><?= $leave->leave_type->type ?></td>
                            <td><?= date('d/m/Y',strtotime($leave->date_from)) ?></td>
                            <td><?= date('d/m/Y',strtotime($leave->date_to)) ?></td>
                            <td><?= $leave->leave_reason ?></td>
                            <td><?php
                                $datetime1 = new DateTime($leave->date_from);

                                $datetime2 = new DateTime($leave->date_to);

                                $difference = $datetime2->diff($datetime1);
                                $days = $difference->days;
                                echo ($days+1).' days';
                             ?></td>
                            <td><?php if($leave->leave_status == 0)echo "<p class='color-blue'>Panding";if($leave->leave_status == 1)echo "<p class='color-green'>Approved";if($leave->leave_status == 2)echo "<p class='color-red'>Rejected"; ?></td>
                            <td class="actions">
                                <?php if($leave->leave_status == 0): ?>
                                    <?= $this->Html->link(__('Approve'), ['action' => 'approve', $leave->id],['class'=>'btn btn-sm btn-success']) ?>
                                    <?= $this->Html->link(__('Reject'), ['action' => 'reject', $leave->id],['class'=>'btn btn-sm btn-danger']) ?>
                                <?php endif; ?>
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

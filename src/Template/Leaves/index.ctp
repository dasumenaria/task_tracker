<style type="text/css">
    .row{
        margin-bottom: 15px;
    }    

    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td
    {
        border: 1px solid #cecece;
    }
    .actions
    {
        width: 100px;
    }
    .box-body>.table {
        margin-bottom: 20px;
    }
</style>

<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Leave Report </b>
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
                                        <label class="control-label">Select User</label>
                                        <?= $this->Form->control('user_id',['empty'=>'---Select---','options'=>$users,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="control-label">Select Leave Status</label>
                                        <select name="leave_status" class="form-control input-sm select2">
                                            <option value="">---select---</option>
                                            <option value="3">Panding</option>
                                            <option value="1">Approve</option>
                                            <option value="2">Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <!--<div class="row">
                                    <div class="col-md-4 text-right"><h4>By Date:</h4></div>
                                    
                                    <div class="col-md-4">
                                        <input type="text" class="form-control datepickers" data-date-format="dd-mm-yyyy" name="date_from" id="date_from" placeholder="From">
                                    </div>

                                    <div class="col-md-4">
                                        <input type="text" class="form-control datepickers" data-date-format="dd-mm-yyyy" name="date_to" id="date_to" placeholder="To">
                                    </div>
                                </div>-->

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
            			
                <?php foreach ($data as $user): $k = 0;?>

                    <table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
                        <tbody>
                            <tr>
                                <th colspan="8"><?= $user['user_name']?> <p class="pull-right">Total Leave:  <?= $user['total_leaves']?></p></th>
                            </tr>
                            <?php foreach ($user['leave_data'] as $leave): $k++?>
                                <tr style='background-color:<?php if($leave['leave_status'] == 0) echo ""; if($leave['leave_status'] == 1)echo "#d9ffe9"; if($leave['leave_status'] == 2)echo "#ffd9d9"; ?>'>
                                    <td><?= $this->Number->format($k) ?></td>
                                    <td><?= $leave['leave_type'] ?></td>
                                    <td><?= $leave['leave_reason'] ?></td>
                                    <td><?php
                                        $datetime1 = new DateTime($leave['date_from']);

                                        $datetime2 = new DateTime($leave['date_to']);

                                        $difference = $datetime2->diff($datetime1);
                                        $days = $difference->days;
                                        echo ($days+1).' days';
                                     ?></td>
                                    <td><?= date('d/m/Y',strtotime($leave['date_from'])) ?></td>
                                    <td><?= date('d/m/Y',strtotime($leave['date_to'])) ?></td>
                                    <td><?php if($leave['leave_status'] == 0)echo "<p class='color-blue'>Panding";if($leave['leave_status'] == 1)echo "<p class='color-green'>Approved";if($leave['leave_status'] == 2)echo "<p class='color-red'>Rejected"; ?></td>
                                    <td class="actions"> 
        								 
        								<?php echo $this->Html->link('<i class="fa fa-check"></i>', ['action' => 'approve', $leave['id']],['escape'=>false,'class'=>'btn btn-xs btn-success']) ?>
        								<?php echo $this->Html->link(('<i class="fa fa-times"></i>'), ['action' => 'reject', $leave['id']],['escape'=>false,'class'=>'btn btn-xs btn-danger']) ?>

                                        <?php echo $this->Html->link(('<i class="fa fa-edit"></i>'), ['action' => 'edit', $leave['id']],['escape'=>false,'class'=>'btn btn-xs btn-info']) ?>
                                         
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php endforeach; ?>   
            </div>
        </div>
    </div>
</div>

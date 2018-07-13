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
                <div class="leaves form large-9 medium-8 columns content">
                    <?= $this->Form->create($leave) ?>
                    <fieldset>
                        <legend><?= __('Edit Leave') ?></legend>

                        <div class="col-md-8 col-md-offset-2">
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <label class="control-label">Select User</label>
                                        <?= $this->Form->control('user_id',['empty'=>'---Select---','options'=>$users,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Select User</label>
                                        <?= $this->Form->control('leave_type_id',['empty'=>'---Select---','options'=>$leaveTypes,'class'=>'form-control input-sm select2','label'=>false]) ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">From</label>
                                        <?= $this->Form->control('date_from',['class'=>'form-control datepickers','label'=>false,'type'=>'text','data-date-format'=>'dd-mm-yyyy']) ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">To</label>
                                        <?= $this->Form->control('date_to',['class'=>'form-control datepickers','label'=>false,'type'=>'text','data-date-format'=>'dd-mm-yyyy']) ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label">Leave Reason</label>
                                        <?= $this->Form->control('leave_reason',['class'=>'form-control input-sm','label'=>false,'type'=>'textarea']) ?>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label">Action Reason</label>
                                        <?= $this->Form->control('action_reason',['class'=>'form-control input-sm','label'=>false,'type'=>'textarea']) ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" align="center">
                                        <hr style="margin-top: 12px;margin-bottom: 10px;"></hr>

                                        <?php echo $this->Form->button('Submit',['class'=>'btn btn-sm btn-success','id'=>'submit_member','name'=>'search_report']); ?>
                                    </div> 
                                </div>
                            </div>
                    </fieldset>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>


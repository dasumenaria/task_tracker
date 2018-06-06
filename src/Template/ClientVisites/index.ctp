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
                                        <label class="control-label">By Client</label>
                                        <?= $this->Form->control('master_client_id',['empty'=>'---Select---','options'=>$masterClients,'class'=>'form-control input-sm select2','label'=>false]) ?>
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
                                        <a href="<?php echo $this->Url->build(array('controller'=>'ClientVisites','action'=>'index')) ?>"class="btn btn-danger btn-sm">Reset</a>

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
                            <th scope="col"><?= $this->Paginator->sort('master_client_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('visit_date') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('reason') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('vehicle_type') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $k = 0; foreach ($clientVisites as $leave): $k++?>
                        <tr>
                            <td><?= $this->Number->format($k) ?></td>
                            <td><?= $leave->user->name ?></td>
                            <td><?= $leave->master_client->client_name ?></td>
                            <td><?= date('d/m/Y',strtotime($leave->visit_date)) ?></td>
                            <td><?= $leave->duration ?></td>
                            <td><?= $leave->reason ?></td>
                            <td><?= $leave->vehicle_type ?></td>
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

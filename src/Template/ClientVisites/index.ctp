<style type="text/css">
    .user{
        background-color: #2391c3;
        color: #fff;
    }

    .row{
        margin-bottom: 15px;
    }    
</style>

<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <b>Client Visit Report </b>
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

                <?php foreach ($data as $client): $k = 0;?>

                    <table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
                        <tbody>
                            <tr>
                                <th class="user" colspan="5"><?= $client['client_name']?> <p class="pull-right">Total Meetings:  <?= $client['total_meetings']?></p></th>
                            </tr>
                            <?php foreach ($client['meeting_data'] as $meeting): $k++?>
                                <tr>
                                    <td><?= $this->Number->format($k) ?></td>
                                    <td><?= $meeting['user'] ?></td>
                                    <td><?= date('d/m/Y',strtotime($meeting['visit_date'])) ?></td>
                                    <td><?= $meeting['reason'] ?></td>
                                    <td><?= $meeting['vehicle_type']." vehicle" ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                <?php endforeach; ?> 
            </div>
        </div>
    </div>
</div>

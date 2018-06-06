<section class="content">
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<b>Project </b>
 			</div>
			<div class="box-body" style="overflow-x:scroll"> 
			<table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leave_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_to') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leave_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leaves as $leave): ?>
            <tr>
                <td><?= $this->Number->format($leave->id) ?></td>
                <td><?= $leave->has('user') ? $this->Html->link($leave->user->name, ['controller' => 'Users', 'action' => 'view', $leave->user->id]) : '' ?></td>
                <td><?= $leave->has('leave_type') ? $this->Html->link($leave->leave_type->id, ['controller' => 'LeaveTypes', 'action' => 'view', $leave->leave_type->id]) : '' ?></td>
                <td><?= h($leave->date_from) ?></td>
                <td><?= h($leave->date_to) ?></td>
                <td><?= h($leave->duration) ?></td>
                <td><?php echo  $leave->leave_status; ?></td>
                <td><?= h($leave->created_on) ?></td>
                <td><?= $this->Number->format($leave->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leave->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?>
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

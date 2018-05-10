<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\LeaveType $leaveType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Leave Type'), ['action' => 'edit', $leaveType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Leave Type'), ['action' => 'delete', $leaveType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaveType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leave Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leaves'), ['controller' => 'Leaves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave'), ['controller' => 'Leaves', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leaveTypes view large-9 medium-8 columns content">
    <h3><?= h($leaveType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($leaveType->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leaveType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($leaveType->is_deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Leaves') ?></h4>
        <?php if (!empty($leaveType->leaves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Leave Type Id') ?></th>
                <th scope="col"><?= __('Date From') ?></th>
                <th scope="col"><?= __('Date To') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Leave Reason') ?></th>
                <th scope="col"><?= __('Leave Status') ?></th>
                <th scope="col"><?= __('Action Reason') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($leaveType->leaves as $leaves): ?>
            <tr>
                <td><?= h($leaves->id) ?></td>
                <td><?= h($leaves->user_id) ?></td>
                <td><?= h($leaves->leave_type_id) ?></td>
                <td><?= h($leaves->date_from) ?></td>
                <td><?= h($leaves->date_to) ?></td>
                <td><?= h($leaves->duration) ?></td>
                <td><?= h($leaves->leave_reason) ?></td>
                <td><?= h($leaves->leave_status) ?></td>
                <td><?= h($leaves->action_reason) ?></td>
                <td><?= h($leaves->created_on) ?></td>
                <td><?= h($leaves->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Leaves', 'action' => 'view', $leaves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leaves', 'action' => 'edit', $leaves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leaves', 'action' => 'delete', $leaves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

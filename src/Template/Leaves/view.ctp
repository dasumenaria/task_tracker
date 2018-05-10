<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Leave'), ['action' => 'edit', $leave->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Leave'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Leaves'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leave Types'), ['controller' => 'LeaveTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave Type'), ['controller' => 'LeaveTypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="leaves view large-9 medium-8 columns content">
    <h3><?= h($leave->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $leave->has('user') ? $this->Html->link($leave->user->name, ['controller' => 'Users', 'action' => 'view', $leave->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leave Type') ?></th>
            <td><?= $leave->has('leave_type') ? $this->Html->link($leave->leave_type->id, ['controller' => 'LeaveTypes', 'action' => 'view', $leave->leave_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= h($leave->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($leave->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leave Status') ?></th>
            <td><?= $this->Number->format($leave->leave_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($leave->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date From') ?></th>
            <td><?= h($leave->date_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date To') ?></th>
            <td><?= h($leave->date_to) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($leave->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Leave Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($leave->leave_reason)); ?>
    </div>
    <div class="row">
        <h4><?= __('Action Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($leave->action_reason)); ?>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskStatus $taskStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task Status'), ['action' => 'edit', $taskStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task Status'), ['action' => 'delete', $taskStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Task Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="taskStatuses view large-9 medium-8 columns content">
    <h3><?= h($taskStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $taskStatus->has('user') ? $this->Html->link($taskStatus->user->name, ['controller' => 'Users', 'action' => 'view', $taskStatus->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($taskStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($taskStatus->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($taskStatus->created_on) ?></td>
        </tr>
    </table>
</div>

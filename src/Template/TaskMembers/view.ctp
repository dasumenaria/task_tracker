<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskMember $taskMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Task Member'), ['action' => 'edit', $taskMember->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Task Member'), ['action' => 'delete', $taskMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskMember->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Task Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Member'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="taskMembers view large-9 medium-8 columns content">
    <h3><?= h($taskMember->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Task') ?></th>
            <td><?= $taskMember->has('task') ? $this->Html->link($taskMember->task->id, ['controller' => 'Tasks', 'action' => 'view', $taskMember->task->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $taskMember->has('user') ? $this->Html->link($taskMember->user->name, ['controller' => 'Users', 'action' => 'view', $taskMember->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($taskMember->id) ?></td>
        </tr>
    </table>
</div>

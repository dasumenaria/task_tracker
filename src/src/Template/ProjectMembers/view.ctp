<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectMember $projectMember
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Member'), ['action' => 'edit', $projectMember->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Member'), ['action' => 'delete', $projectMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMember->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Member'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectMembers view large-9 medium-8 columns content">
    <h3><?= h($projectMember->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $projectMember->has('project') ? $this->Html->link($projectMember->project->title, ['controller' => 'Projects', 'action' => 'view', $projectMember->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $projectMember->has('user') ? $this->Html->link($projectMember->user->name, ['controller' => 'Users', 'action' => 'view', $projectMember->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectMember->id) ?></td>
        </tr>
    </table>
</div>

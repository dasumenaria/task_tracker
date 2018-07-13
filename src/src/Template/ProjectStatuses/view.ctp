<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectStatus $projectStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project Status'), ['action' => 'edit', $projectStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project Status'), ['action' => 'delete', $projectStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Project Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projectStatuses view large-9 medium-8 columns content">
    <h3><?= h($projectStatus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $projectStatus->has('project') ? $this->Html->link($projectStatus->project->title, ['controller' => 'Projects', 'action' => 'view', $projectStatus->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($projectStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($projectStatus->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($projectStatus->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($projectStatus->created_on) ?></td>
        </tr>
    </table>
</div>

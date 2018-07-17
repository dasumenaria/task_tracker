<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectStatus[]|\Cake\Collection\CollectionInterface $projectStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectStatuses index large-9 medium-8 columns content">
    <h3><?= __('Project Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectStatuses as $projectStatus): ?>
            <tr>
                <td><?= $this->Number->format($projectStatus->id) ?></td>
                <td><?= $projectStatus->has('project') ? $this->Html->link($projectStatus->project->title, ['controller' => 'Projects', 'action' => 'view', $projectStatus->project->id]) : '' ?></td>
                <td><?= h($projectStatus->deadline) ?></td>
                <td><?= h($projectStatus->created_on) ?></td>
                <td><?= $this->Number->format($projectStatus->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectStatus->id)]) ?>
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

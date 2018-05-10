<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectMember[]|\Cake\Collection\CollectionInterface $projectMembers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Project Member'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectMembers index large-9 medium-8 columns content">
    <h3><?= __('Project Members') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projectMembers as $projectMember): ?>
            <tr>
                <td><?= $this->Number->format($projectMember->id) ?></td>
                <td><?= $projectMember->has('project') ? $this->Html->link($projectMember->project->title, ['controller' => 'Projects', 'action' => 'view', $projectMember->project->id]) : '' ?></td>
                <td><?= $projectMember->has('user') ? $this->Html->link($projectMember->user->name, ['controller' => 'Users', 'action' => 'view', $projectMember->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projectMember->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectMember->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMember->id)]) ?>
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

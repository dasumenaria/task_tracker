<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskStatus[]|\Cake\Collection\CollectionInterface $taskStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taskStatuses index large-9 medium-8 columns content">
    <h3><?= __('Task Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deadline') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taskStatuses as $taskStatus): ?>
            <tr>
                <td><?= $this->Number->format($taskStatus->id) ?></td>
                <td><?= $taskStatus->has('user') ? $this->Html->link($taskStatus->user->name, ['controller' => 'Users', 'action' => 'view', $taskStatus->user->id]) : '' ?></td>
                <td><?= h($taskStatus->deadline) ?></td>
                <td><?= h($taskStatus->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $taskStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taskStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatus->id)]) ?>
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

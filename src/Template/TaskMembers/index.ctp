<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskMember[]|\Cake\Collection\CollectionInterface $taskMembers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task Member'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taskMembers index large-9 medium-8 columns content">
    <h3><?= __('Task Members') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('task_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taskMembers as $taskMember): ?>
            <tr>
                <td><?= $this->Number->format($taskMember->id) ?></td>
                <td><?= $taskMember->has('task') ? $this->Html->link($taskMember->task->id, ['controller' => 'Tasks', 'action' => 'view', $taskMember->task->id]) : '' ?></td>
                <td><?= $taskMember->has('user') ? $this->Html->link($taskMember->user->name, ['controller' => 'Users', 'action' => 'view', $taskMember->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $taskMember->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taskMember->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $taskMember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskMember->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chat[]|\Cake\Collection\CollectionInterface $chats
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Chat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chats index large-9 medium-8 columns content">
    <h3><?= __('Chats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_from_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_to_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($chats as $chat): ?>
            <tr>
                <td><?= $this->Number->format($chat->id) ?></td>
                <td><?= $this->Number->format($chat->user_from_id) ?></td>
                <td><?= $this->Number->format($chat->user_to_id) ?></td>
                <td><?= $chat->has('project') ? $this->Html->link($chat->project->title, ['controller' => 'Projects', 'action' => 'view', $chat->project->id]) : '' ?></td>
                <td><?= h($chat->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $chat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $chat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chat $chat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chat'), ['action' => 'edit', $chat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chat'), ['action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chats view large-9 medium-8 columns content">
    <h3><?= h($chat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $chat->has('project') ? $this->Html->link($chat->project->title, ['controller' => 'Projects', 'action' => 'view', $chat->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chat->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User From Id') ?></th>
            <td><?= $this->Number->format($chat->user_from_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User To Id') ?></th>
            <td><?= $this->Number->format($chat->user_to_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($chat->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Chat Messages') ?></h4>
        <?= $this->Text->autoParagraph(h($chat->chat_messages)); ?>
    </div>
</div>

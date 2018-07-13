<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chat $chat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $chat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Chats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chats form large-9 medium-8 columns content">
    <?= $this->Form->create($chat) ?>
    <fieldset>
        <legend><?= __('Edit Chat') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('sendto_user_id');
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('chat_messages');
            echo $this->Form->control('created_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

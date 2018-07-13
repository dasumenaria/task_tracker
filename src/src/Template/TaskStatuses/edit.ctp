<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TaskStatus $taskStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $taskStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Task Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="taskStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($taskStatus) ?>
    <fieldset>
        <legend><?= __('Edit Task Status') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('deadline');
            echo $this->Form->control('created_on');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

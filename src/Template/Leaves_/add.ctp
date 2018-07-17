<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Leaves'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Leave Types'), ['controller' => 'LeaveTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leave Type'), ['controller' => 'LeaveTypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="leaves form large-9 medium-8 columns content">
    <?= $this->Form->create($leave) ?>
    <fieldset>
        <legend><?= __('Add Leave') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('leave_type_id', ['options' => $leaveTypes]);
            echo $this->Form->control('date_from');
            echo $this->Form->control('date_to');
            echo $this->Form->control('duration');
            echo $this->Form->control('leave_reason');
            echo $this->Form->control('leave_status');
            echo $this->Form->control('action_reason');
            echo $this->Form->control('created_on');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

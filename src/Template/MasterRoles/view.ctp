<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterRole $masterRole
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Role'), ['action' => 'edit', $masterRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Role'), ['action' => 'delete', $masterRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterRole->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterRoles view large-9 medium-8 columns content">
    <h3><?= h($masterRole->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($masterRole->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterRole->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($masterRole->is_deleted) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($masterRole->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Mobile No') ?></th>
                <th scope="col"><?= __('Date Of Birth') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Master Role Id') ?></th>
                <th scope="col"><?= __('Mobile Otp') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($masterRole->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->mobile_no) ?></td>
                <td><?= h($users->date_of_birth) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->master_role_id) ?></td>
                <td><?= h($users->mobile_otp) ?></td>
                <td><?= h($users->details) ?></td>
                <td><?= h($users->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

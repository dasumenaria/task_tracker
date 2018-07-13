<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClientPoc $masterClientPoc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Master Client Poc'), ['action' => 'edit', $masterClientPoc->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master Client Poc'), ['action' => 'delete', $masterClientPoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClientPoc->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Master Client Pocs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Client Poc'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="masterClientPocs view large-9 medium-8 columns content">
    <h3><?= h($masterClientPoc->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Client') ?></th>
            <td><?= $masterClientPoc->has('master_client') ? $this->Html->link($masterClientPoc->master_client->id, ['controller' => 'MasterClients', 'action' => 'view', $masterClientPoc->master_client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person Name') ?></th>
            <td><?= h($masterClientPoc->contact_person_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($masterClientPoc->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($masterClientPoc->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile') ?></th>
            <td><?= h($masterClientPoc->mobile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterClientPoc->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($masterClientPoc->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($masterClientPoc->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($masterClientPoc->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($masterClientPoc->password)); ?>
    </div>
</div>

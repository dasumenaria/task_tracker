<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientVisite $clientVisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client Visite'), ['action' => 'edit', $clientVisite->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client Visite'), ['action' => 'delete', $clientVisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientVisite->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Client Visites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Visite'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientVisites view large-9 medium-8 columns content">
    <h3><?= h($clientVisite->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Client') ?></th>
            <td><?= $clientVisite->has('master_client') ? $this->Html->link($clientVisite->master_client->id, ['controller' => 'MasterClients', 'action' => 'view', $clientVisite->master_client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $clientVisite->has('user') ? $this->Html->link($clientVisite->user->name, ['controller' => 'Users', 'action' => 'view', $clientVisite->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicle Type') ?></th>
            <td><?= h($clientVisite->vehicle_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clientVisite->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($clientVisite->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visit Date') ?></th>
            <td><?= h($clientVisite->visit_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($clientVisite->created_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Reason') ?></h4>
        <?= $this->Text->autoParagraph(h($clientVisite->reason)); ?>
    </div>
</div>

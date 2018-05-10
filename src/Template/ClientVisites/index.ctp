<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientVisite[]|\Cake\Collection\CollectionInterface $clientVisites
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Client Visite'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientVisites index large-9 medium-8 columns content">
    <h3><?= __('Client Visites') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_client_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visit_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicle_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientVisites as $clientVisite): ?>
            <tr>
                <td><?= $this->Number->format($clientVisite->id) ?></td>
                <td><?= $clientVisite->has('master_client') ? $this->Html->link($clientVisite->master_client->id, ['controller' => 'MasterClients', 'action' => 'view', $clientVisite->master_client->id]) : '' ?></td>
                <td><?= $clientVisite->has('user') ? $this->Html->link($clientVisite->user->name, ['controller' => 'Users', 'action' => 'view', $clientVisite->user->id]) : '' ?></td>
                <td><?= h($clientVisite->visit_date) ?></td>
                <td><?= h($clientVisite->vehicle_type) ?></td>
                <td><?= h($clientVisite->created_on) ?></td>
                <td><?= $this->Number->format($clientVisite->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $clientVisite->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientVisite->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientVisite->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientVisite->id)]) ?>
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

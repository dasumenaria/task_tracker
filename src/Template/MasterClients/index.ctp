<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClient[]|\Cake\Collection\CollectionInterface $masterClients
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Client'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Client Visites'), ['controller' => 'ClientVisites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client Visite'), ['controller' => 'ClientVisites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Client Pocs'), ['controller' => 'MasterClientPocs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client Poc'), ['controller' => 'MasterClientPocs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClients index large-9 medium-8 columns content">
    <h3><?= __('Master Clients') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('edited_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterClients as $masterClient): ?>
            <tr>
                <td><?= $this->Number->format($masterClient->id) ?></td>
                <td><?= h($masterClient->client_name) ?></td>
                <td><?= h($masterClient->created_on) ?></td>
                <td><?= $this->Number->format($masterClient->created_by) ?></td>
                <td><?= h($masterClient->edited_on) ?></td>
                <td><?= $this->Number->format($masterClient->edited_by) ?></td>
                <td><?= $this->Number->format($masterClient->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterClient->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterClient->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterClient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClient->id)]) ?>
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

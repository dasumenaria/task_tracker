<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClientPoc[]|\Cake\Collection\CollectionInterface $masterClientPocs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Client Poc'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClientPocs index large-9 medium-8 columns content">
    <h3><?= __('Master Client Pocs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('master_client_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_person_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mobile') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterClientPocs as $masterClientPoc): ?>
            <tr>
                <td><?= $this->Number->format($masterClientPoc->id) ?></td>
                <td><?= $masterClientPoc->has('master_client') ? $this->Html->link($masterClientPoc->master_client->id, ['controller' => 'MasterClients', 'action' => 'view', $masterClientPoc->master_client->id]) : '' ?></td>
                <td><?= h($masterClientPoc->contact_person_name) ?></td>
                <td><?= h($masterClientPoc->email) ?></td>
                <td><?= h($masterClientPoc->username) ?></td>
                <td><?= h($masterClientPoc->mobile) ?></td>
                <td><?= h($masterClientPoc->created_on) ?></td>
                <td><?= $this->Number->format($masterClientPoc->created_by) ?></td>
                <td><?= $this->Number->format($masterClientPoc->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterClientPoc->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterClientPoc->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterClientPoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClientPoc->id)]) ?>
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

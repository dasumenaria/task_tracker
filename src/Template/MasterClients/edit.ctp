<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClient $masterClient
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $masterClient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $masterClient->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Master Clients'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Client Visites'), ['controller' => 'ClientVisites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client Visite'), ['controller' => 'ClientVisites', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Master Client Pocs'), ['controller' => 'MasterClientPocs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client Poc'), ['controller' => 'MasterClientPocs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClients form large-9 medium-8 columns content">
    <?= $this->Form->create($masterClient) ?>
    <fieldset>
        <legend><?= __('Edit Master Client') ?></legend>
        <?php
            echo $this->Form->control('client_name');
            echo $this->Form->control('location');
            echo $this->Form->control('address');
            echo $this->Form->control('created_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('edited_on');
            echo $this->Form->control('edited_by');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

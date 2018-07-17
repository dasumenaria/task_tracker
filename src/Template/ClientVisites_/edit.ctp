<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientVisite $clientVisite
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clientVisite->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clientVisite->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Client Visites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientVisites form large-9 medium-8 columns content">
    <?= $this->Form->create($clientVisite) ?>
    <fieldset>
        <legend><?= __('Edit Client Visite') ?></legend>
        <?php
            echo $this->Form->control('master_client_id', ['options' => $masterClients]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('visit_date');
            echo $this->Form->control('vehicle_type');
            echo $this->Form->control('reason');
            echo $this->Form->control('created_on');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

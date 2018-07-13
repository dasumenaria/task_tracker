<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterClientPoc $masterClientPoc
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Master Client Pocs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterClientPocs form large-9 medium-8 columns content">
    <?= $this->Form->create($masterClientPoc) ?>
    <fieldset>
        <legend><?= __('Add Master Client Poc') ?></legend>
        <?php
            echo $this->Form->control('master_client_id', ['options' => $masterClients]);
            echo $this->Form->control('contact_person_name');
            echo $this->Form->control('email');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('mobile');
            echo $this->Form->control('created_on');
            echo $this->Form->control('created_by');
            echo $this->Form->control('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

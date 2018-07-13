<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectStatus $projectStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Project Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projectStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($projectStatus) ?>
    <fieldset>
        <legend><?= __('Edit Project Status') ?></legend>
        <?php
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('deadline');
            echo $this->Form->control('created_on');
            echo $this->Form->control('created_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

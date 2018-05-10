<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Clients'), ['controller' => 'MasterClients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Client'), ['controller' => 'MasterClients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Members'), ['controller' => 'ProjectMembers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Member'), ['controller' => 'ProjectMembers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Statuses'), ['controller' => 'ProjectStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Status'), ['controller' => 'ProjectStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Master Client') ?></th>
            <td><?= $project->has('master_client') ? $this->Html->link($project->master_client->id, ['controller' => 'MasterClients', 'action' => 'view', $project->master_client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $project->has('user') ? $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completed Status') ?></th>
            <td><?= $this->Number->format($project->completed_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($project->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Editied By') ?></th>
            <td><?= $this->Number->format($project->editied_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($project->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deadline') ?></th>
            <td><?= h($project->deadline) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Completed Date') ?></th>
            <td><?= h($project->completed_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($project->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($project->edited_on) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Project Members') ?></h4>
        <?php if (!empty($project->project_members)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_members as $projectMembers): ?>
            <tr>
                <td><?= h($projectMembers->id) ?></td>
                <td><?= h($projectMembers->project_id) ?></td>
                <td><?= h($projectMembers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectMembers', 'action' => 'view', $projectMembers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectMembers', 'action' => 'edit', $projectMembers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectMembers', 'action' => 'delete', $projectMembers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectMembers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Project Statuses') ?></h4>
        <?php if (!empty($project->project_statuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->project_statuses as $projectStatuses): ?>
            <tr>
                <td><?= h($projectStatuses->id) ?></td>
                <td><?= h($projectStatuses->project_id) ?></td>
                <td><?= h($projectStatuses->deadline) ?></td>
                <td><?= h($projectStatuses->created_on) ?></td>
                <td><?= h($projectStatuses->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProjectStatuses', 'action' => 'view', $projectStatuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProjectStatuses', 'action' => 'edit', $projectStatuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProjectStatuses', 'action' => 'delete', $projectStatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectStatuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($project->tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Created User Id') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Completed On') ?></th>
                <th scope="col"><?= __('Deleted On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->id) ?></td>
                <td><?= h($tasks->user_id) ?></td>
                <td><?= h($tasks->project_id) ?></td>
                <td><?= h($tasks->title) ?></td>
                <td><?= h($tasks->status) ?></td>
                <td><?= h($tasks->deadline) ?></td>
                <td><?= h($tasks->created_user_id) ?></td>
                <td><?= h($tasks->created_on) ?></td>
                <td><?= h($tasks->completed_on) ?></td>
                <td><?= h($tasks->deleted_on) ?></td>
                <td><?= h($tasks->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

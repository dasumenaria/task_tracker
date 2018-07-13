<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Master Roles'), ['controller' => 'MasterRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master Role'), ['controller' => 'MasterRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Client Visites'), ['controller' => 'ClientVisites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Visite'), ['controller' => 'ClientVisites', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leaves'), ['controller' => 'Leaves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leave'), ['controller' => 'Leaves', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notes'), ['controller' => 'Notes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Note'), ['controller' => 'Notes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Project Members'), ['controller' => 'ProjectMembers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project Member'), ['controller' => 'ProjectMembers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Task Statuses'), ['controller' => 'TaskStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task Status'), ['controller' => 'TaskStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($user->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Master Role') ?></th>
            <td><?= $user->has('master_role') ? $this->Html->link($user->master_role->name, ['controller' => 'MasterRoles', 'action' => 'view', $user->master_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile Otp') ?></th>
            <td><?= h($user->mobile_otp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($user->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($user->date_of_birth) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Password') ?></h4>
        <?= $this->Text->autoParagraph(h($user->password)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($user->details)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Client Visites') ?></h4>
        <?php if (!empty($user->client_visites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Client Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Visit Date') ?></th>
                <th scope="col"><?= __('Vehicle Type') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->client_visites as $clientVisites): ?>
            <tr>
                <td><?= h($clientVisites->id) ?></td>
                <td><?= h($clientVisites->master_client_id) ?></td>
                <td><?= h($clientVisites->user_id) ?></td>
                <td><?= h($clientVisites->visit_date) ?></td>
                <td><?= h($clientVisites->vehicle_type) ?></td>
                <td><?= h($clientVisites->reason) ?></td>
                <td><?= h($clientVisites->created_on) ?></td>
                <td><?= h($clientVisites->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ClientVisites', 'action' => 'view', $clientVisites->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ClientVisites', 'action' => 'edit', $clientVisites->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClientVisites', 'action' => 'delete', $clientVisites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientVisites->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Leaves') ?></h4>
        <?php if (!empty($user->leaves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Leave Type Id') ?></th>
                <th scope="col"><?= __('Date From') ?></th>
                <th scope="col"><?= __('Date To') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Leave Reason') ?></th>
                <th scope="col"><?= __('Leave Status') ?></th>
                <th scope="col"><?= __('Action Reason') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->leaves as $leaves): ?>
            <tr>
                <td><?= h($leaves->id) ?></td>
                <td><?= h($leaves->user_id) ?></td>
                <td><?= h($leaves->leave_type_id) ?></td>
                <td><?= h($leaves->date_from) ?></td>
                <td><?= h($leaves->date_to) ?></td>
                <td><?= h($leaves->duration) ?></td>
                <td><?= h($leaves->leave_reason) ?></td>
                <td><?= h($leaves->leave_status) ?></td>
                <td><?= h($leaves->action_reason) ?></td>
                <td><?= h($leaves->created_on) ?></td>
                <td><?= h($leaves->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Leaves', 'action' => 'view', $leaves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Leaves', 'action' => 'edit', $leaves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leaves', 'action' => 'delete', $leaves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Notes') ?></h4>
        <?php if (!empty($user->notes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->notes as $notes): ?>
            <tr>
                <td><?= h($notes->id) ?></td>
                <td><?= h($notes->user_id) ?></td>
                <td><?= h($notes->note) ?></td>
                <td><?= h($notes->created_on) ?></td>
                <td><?= h($notes->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Notes', 'action' => 'view', $notes->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Notes', 'action' => 'edit', $notes->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Notes', 'action' => 'delete', $notes->], ['confirm' => __('Are you sure you want to delete # {0}?', $notes->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Project Members') ?></h4>
        <?php if (!empty($user->project_members)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->project_members as $projectMembers): ?>
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
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($user->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Client Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Completed Status') ?></th>
                <th scope="col"><?= __('Completed Date') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Edited On') ?></th>
                <th scope="col"><?= __('Editied By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->master_client_id) ?></td>
                <td><?= h($projects->user_id) ?></td>
                <td><?= h($projects->title) ?></td>
                <td><?= h($projects->deadline) ?></td>
                <td><?= h($projects->completed_status) ?></td>
                <td><?= h($projects->completed_date) ?></td>
                <td><?= h($projects->created_by) ?></td>
                <td><?= h($projects->created_on) ?></td>
                <td><?= h($projects->edited_on) ?></td>
                <td><?= h($projects->editied_by) ?></td>
                <td><?= h($projects->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Task Statuses') ?></h4>
        <?php if (!empty($user->task_statuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Deadline') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->task_statuses as $taskStatuses): ?>
            <tr>
                <td><?= h($taskStatuses->id) ?></td>
                <td><?= h($taskStatuses->user_id) ?></td>
                <td><?= h($taskStatuses->deadline) ?></td>
                <td><?= h($taskStatuses->created_on) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TaskStatuses', 'action' => 'view', $taskStatuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TaskStatuses', 'action' => 'edit', $taskStatuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TaskStatuses', 'action' => 'delete', $taskStatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $taskStatuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($user->tasks)): ?>
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
            <?php foreach ($user->tasks as $tasks): ?>
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

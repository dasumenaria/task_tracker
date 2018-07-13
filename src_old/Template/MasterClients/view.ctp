 
<div class="masterClients view large-9 medium-8 columns content">
    <h3><?= h($masterClient->id) ?></h3>
    <table class="table table-bordered" cellpadding="0" cellspacing="0" id="main_tble">
        <tr>
            <th scope="row"><?= __('Client Name') ?></th>
            <td><?= h($masterClient->client_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($masterClient->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($masterClient->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited By') ?></th>
            <td><?= $this->Number->format($masterClient->edited_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $this->Number->format($masterClient->is_deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created On') ?></th>
            <td><?= h($masterClient->created_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edited On') ?></th>
            <td><?= h($masterClient->edited_on) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Location') ?></h4>
        <?= $this->Text->autoParagraph(h($masterClient->location)); ?>
    </div>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($masterClient->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Client Visites') ?></h4>
        <?php if (!empty($masterClient->client_visites)): ?>
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
            <?php foreach ($masterClient->client_visites as $clientVisites): ?>
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
        <h4><?= __('Related Master Client Pocs') ?></h4>
        <?php if (!empty($masterClient->master_client_pocs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Master Client Id') ?></th>
                <th scope="col"><?= __('Contact Person Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Created On') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($masterClient->master_client_pocs as $masterClientPocs): ?>
            <tr>
                <td><?= h($masterClientPocs->id) ?></td>
                <td><?= h($masterClientPocs->master_client_id) ?></td>
                <td><?= h($masterClientPocs->contact_person_name) ?></td>
                <td><?= h($masterClientPocs->email) ?></td>
                <td><?= h($masterClientPocs->username) ?></td>
                <td><?= h($masterClientPocs->password) ?></td>
                <td><?= h($masterClientPocs->mobile) ?></td>
                <td><?= h($masterClientPocs->created_on) ?></td>
                <td><?= h($masterClientPocs->created_by) ?></td>
                <td><?= h($masterClientPocs->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MasterClientPocs', 'action' => 'view', $masterClientPocs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MasterClientPocs', 'action' => 'edit', $masterClientPocs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MasterClientPocs', 'action' => 'delete', $masterClientPocs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterClientPocs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($masterClient->projects)): ?>
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
            <?php foreach ($masterClient->projects as $projects): ?>
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
</div>

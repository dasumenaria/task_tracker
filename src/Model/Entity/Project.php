<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property int $master_client_id
 * @property int $user_id
 * @property string $title
 * @property \Cake\I18n\FrozenDate $deadline
 * @property int $completed_status
 * @property \Cake\I18n\FrozenDate $completed_date
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenTime $edited_on
 * @property int $editied_by
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterClient $master_client
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ProjectMember[] $project_members
 * @property \App\Model\Entity\ProjectStatus[] $project_statuses
 * @property \App\Model\Entity\Task[] $tasks
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => true
    ];
}

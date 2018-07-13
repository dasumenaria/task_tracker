<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $title
 * @property int $status
 * @property \Cake\I18n\FrozenDate $deadline
 * @property int $created_user_id
 * @property \Cake\I18n\FrozenTime $created_on
 * @property \Cake\I18n\FrozenDate $completed_on
 * @property \Cake\I18n\FrozenDate $deleted_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\CreatedUser $created_user
 */
class Task extends Entity
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
        'user_id' => true,
        'project_id' => true,
        'title' => true,
        'status' => true,
        'deadline' => true,
        'created_user_id' => true,
        'created_on' => true,
        'completed_on' => true,
        'deleted_on' => true,
        'is_deleted' => true,
        'user' => true,
        'project' => true,
        'created_user' => true,
        'completed_by' => true,
        'task_email_status' => true,
        'pending_email_status' => true,
        'task_members' => true
    ];
}

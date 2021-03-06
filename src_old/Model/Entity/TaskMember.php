<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaskMember Entity
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Task $task
 * @property \App\Model\Entity\User $user
 */
class TaskMember extends Entity
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
        'task_id' => true,
        'user_id' => true,
        'task' => true,
        'user' => true
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Leave Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $leave_type_id
 * @property \Cake\I18n\FrozenDate $date_from
 * @property \Cake\I18n\FrozenDate $date_to
 * @property string $duration
 * @property string $leave_reason
 * @property int $leave_status
 * @property string $action_reason
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\LeaveType $leave_type
 */
class Leave extends Entity
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
        'leave_type_id' => true,
        'date_from' => true,
        'date_to' => true,
        'duration' => true,
        'leave_reason' => true,
        'leave_status' => true,
        'action_reason' => true,
        'created_on' => true,
        'is_deleted' => true,
        'user' => true,
        'leave_type' => true,
        'half_day'=>true
    ];
}

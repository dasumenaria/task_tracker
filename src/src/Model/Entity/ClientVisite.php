<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClientVisite Entity
 *
 * @property int $id
 * @property int $master_client_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $visit_date
 * @property string $vehicle_type
 * @property string $reason
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterClient $master_client
 * @property \App\Model\Entity\User $user
 */
class ClientVisite extends Entity
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
        'master_client_id' => true,
        'user_id' => true,
        'visit_date' => true,
        'vehicle_type' => true,
        'reason' => true,
        'created_on' => true,
        'is_deleted' => true,
        'master_client' => true,
        'user' => true
    ];
}

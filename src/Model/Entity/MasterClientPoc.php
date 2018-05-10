<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterClientPoc Entity
 *
 * @property int $id
 * @property int $master_client_id
 * @property string $contact_person_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $mobile
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterClient $master_client
 */
class MasterClientPoc extends Entity
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
        'contact_person_name' => true,
        'email' => true,
        'username' => true,
        'password' => true,
        'mobile' => true,
        'created_on' => true,
        'created_by' => true,
        'is_deleted' => true,
        'master_client' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

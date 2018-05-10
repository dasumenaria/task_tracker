<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MasterClient Entity
 *
 * @property int $id
 * @property string $client_name
 * @property string $location
 * @property string $address
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime $edited_on
 * @property int $edited_by
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\ClientVisite[] $client_visites
 * @property \App\Model\Entity\MasterClientPoc[] $master_client_pocs
 * @property \App\Model\Entity\Project[] $projects
 */
class MasterClient extends Entity
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
        'client_name' => true,
        'location' => true,
        'address' => true,
        'created_on' => true,
        'created_by' => true,
        'edited_on' => true,
        'edited_by' => true,
        'is_deleted' => true,
        'client_visites' => true,
        'master_client_pocs' => true,
        'projects' => true
    ];
}

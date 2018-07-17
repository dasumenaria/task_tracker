<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectStatus Entity
 *
 * @property int $id
 * @property int $project_id
 * @property \Cake\I18n\FrozenDate $deadline
 * @property \Cake\I18n\FrozenTime $created_on
 * @property int $created_by
 *
 * @property \App\Model\Entity\Project $project
 */
class ProjectStatus extends Entity
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

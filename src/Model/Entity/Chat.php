<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chat Entity
 *
 * @property int $id
 * @property int $user_from_id
 * @property int $user_to_id
 * @property int $project_id
 * @property string $chat_messages
 * @property \Cake\I18n\FrozenTime $created_on
 *
 * @property \App\Model\Entity\UserFrom $user_from
 * @property \App\Model\Entity\UserTo $user_to
 * @property \App\Model\Entity\Project $project
 */
class Chat extends Entity
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
        'user_from_id' => true,
        'user_to_id' => true,
        'project_id' => true,
        'chat_messages' => true,
        'created_on' => true,
        'user_from' => true,
        'user_to' => true,
        'project' => true
    ];
}

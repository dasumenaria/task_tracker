<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher; //include this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $mobile_no
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $address
 * @property int $master_role_id
 * @property string $mobile_otp
 * @property string $details
 * @property int $is_deleted
 *
 * @property \App\Model\Entity\MasterRole $master_role
 * @property \App\Model\Entity\ClientVisite[] $client_visites
 * @property \App\Model\Entity\Leave[] $leaves
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\ProjectMember[] $project_members
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\TaskStatus[] $task_statuses
 * @property \App\Model\Entity\Task[] $tasks
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	protected function _setPassword($password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}

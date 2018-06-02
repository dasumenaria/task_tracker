<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\MasterRolesTable|\Cake\ORM\Association\BelongsTo $MasterRoles
 * @property \App\Model\Table\ClientVisitesTable|\Cake\ORM\Association\HasMany $ClientVisites
 * @property \App\Model\Table\LeavesTable|\Cake\ORM\Association\HasMany $Leaves
 * @property \App\Model\Table\NotesTable|\Cake\ORM\Association\HasMany $Notes
 * @property \App\Model\Table\ProjectMembersTable|\Cake\ORM\Association\HasMany $ProjectMembers
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 * @property \App\Model\Table\TaskStatusesTable|\Cake\ORM\Association\HasMany $TaskStatuses
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterRoles', [
            'foreignKey' => 'master_role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ClientVisites', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Leaves', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ProjectMembers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('TaskStatuses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('mobile_no')
            ->maxLength('mobile_no', 20)
            ->requirePresence('mobile_no', 'create')
            ->notEmpty('mobile_no');

       /* $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('mobile_otp')
            ->maxLength('mobile_otp', 20)
            ->requirePresence('mobile_otp', 'create')
            ->notEmpty('mobile_otp');

        $validator
            ->scalar('details')
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        $validator
            ->integer('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');
*/
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
       // $rules->add($rules->existsIn(['master_role_id'], 'MasterRoles'));

        return $rules;
    }
}

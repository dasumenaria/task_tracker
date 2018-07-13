<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leaves Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\LeaveTypesTable|\Cake\ORM\Association\BelongsTo $LeaveTypes
 *
 * @method \App\Model\Entity\Leave get($primaryKey, $options = [])
 * @method \App\Model\Entity\Leave newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Leave[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Leave|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Leave patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Leave[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Leave findOrCreate($search, callable $callback = null, $options = [])
 */
class LeavesTable extends Table
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

        $this->setTable('leaves');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('LeaveTypes', [
            'foreignKey' => 'leave_type_id',
            'joinType' => 'INNER'
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
            ->date('date_from')
            ->requirePresence('date_from', 'create')
            ->notEmpty('date_from');

        $validator
            ->date('date_to')
            ->requirePresence('date_to', 'create')
            ->notEmpty('date_to');

       /*  $validator
            ->scalar('duration')
            ->maxLength('duration', 20)
            ->requirePresence('duration', 'create')
            ->notEmpty('duration');
 */
        $validator
            ->scalar('leave_reason')
            ->requirePresence('leave_reason', 'create')
            ->notEmpty('leave_reason');

       /* $validator
            ->integer('leave_status')
            ->requirePresence('leave_status', 'create')
            ->notEmpty('leave_status');

        $validator
            ->scalar('action_reason')
            ->requirePresence('action_reason', 'create')
            ->notEmpty('action_reason');

        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['leave_type_id'], 'LeaveTypes'));

        return $rules;
    }
}

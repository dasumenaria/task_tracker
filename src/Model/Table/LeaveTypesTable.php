<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LeaveTypes Model
 *
 * @property \App\Model\Table\LeavesTable|\Cake\ORM\Association\HasMany $Leaves
 *
 * @method \App\Model\Entity\LeaveType get($primaryKey, $options = [])
 * @method \App\Model\Entity\LeaveType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LeaveType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LeaveType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LeaveType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LeaveType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LeaveType findOrCreate($search, callable $callback = null, $options = [])
 */
class LeaveTypesTable extends Table
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

        $this->setTable('leave_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Leaves', [
            'foreignKey' => 'leave_type_id'
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
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');

        return $validator;
    }
}

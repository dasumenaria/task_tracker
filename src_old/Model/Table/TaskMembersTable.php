<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaskMembers Model
 *
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\BelongsTo $Tasks
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TaskMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\TaskMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TaskMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TaskMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TaskMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TaskMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TaskMember findOrCreate($search, callable $callback = null, $options = [])
 */
class TaskMembersTable extends Table
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

        $this->setTable('task_members');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tasks', [
            'foreignKey' => 'task_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
        $rules->add($rules->existsIn(['task_id'], 'Tasks'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator; 

/**
 * Projects Model
 *
 * @property \App\Model\Table\MasterClientsTable|\Cake\ORM\Association\BelongsTo $MasterClients
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProjectMembersTable|\Cake\ORM\Association\HasMany $ProjectMembers
 * @property \App\Model\Table\ProjectStatusesTable|\Cake\ORM\Association\HasMany $ProjectStatuses
 * @property \App\Model\Table\TasksTable|\Cake\ORM\Association\HasMany $Tasks
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterClients', [
            'foreignKey' => 'master_client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProjectMembers', [
            'foreignKey' => 'project_id',
			'saveStrategy' => 'replace'
        ]);
        $this->hasMany('ProjectStatuses', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Tasks', [
            'foreignKey' => 'project_id'
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
            ->scalar('title')
            ->maxLength('title', 200)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmpty('deadline');

        /*$validator
            ->integer('completed_status')
            ->requirePresence('completed_status', 'create')
            ->notEmpty('completed_status');

        $validator
            ->date('completed_date')
            ->requirePresence('completed_date', 'create')
            ->notEmpty('completed_date');
		*/
        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        /*$validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->dateTime('edited_on')
            ->requirePresence('edited_on', 'create')
            ->notEmpty('edited_on');

        $validator
            ->integer('editied_by')
            ->requirePresence('editied_by', 'create')
            ->notEmpty('editied_by');

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
        $rules->add($rules->existsIn(['master_client_id'], 'MasterClients'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

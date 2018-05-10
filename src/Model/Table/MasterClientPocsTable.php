<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterClientPocs Model
 *
 * @property \App\Model\Table\MasterClientsTable|\Cake\ORM\Association\BelongsTo $MasterClients
 *
 * @method \App\Model\Entity\MasterClientPoc get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterClientPoc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterClientPoc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterClientPoc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterClientPoc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClientPoc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClientPoc findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterClientPocsTable extends Table
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

        $this->setTable('master_client_pocs');
        $this->setDisplayField('contact_person_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterClients', [
            'foreignKey' => 'master_client_id',
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
            ->scalar('contact_person_name')
            ->maxLength('contact_person_name', 200)
            ->requirePresence('contact_person_name', 'create')
            ->notEmpty('contact_person_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

       /* $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password');
*/
        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 20)
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');
/*
        $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['master_client_id'], 'MasterClients'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClientVisites Model
 *
 * @property \App\Model\Table\MasterClientsTable|\Cake\ORM\Association\BelongsTo $MasterClients
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\ClientVisite get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClientVisite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ClientVisite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClientVisite|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientVisite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClientVisite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClientVisite findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientVisitesTable extends Table
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

        $this->setTable('client_visites');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MasterClients', [
            'foreignKey' => 'master_client_id',
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

        $validator
            ->date('visit_date')
            ->requirePresence('visit_date', 'create')
            ->notEmpty('visit_date');

        $validator
            ->scalar('vehicle_type')
            ->maxLength('vehicle_type', 50)
            ->requirePresence('vehicle_type', 'create')
            ->notEmpty('vehicle_type');

        $validator
            ->scalar('reason')
            ->requirePresence('reason', 'create')
            ->notEmpty('reason');

         
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

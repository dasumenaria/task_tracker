<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MasterClients Model
 *
 * @property \App\Model\Table\ClientVisitesTable|\Cake\ORM\Association\HasMany $ClientVisites
 * @property \App\Model\Table\MasterClientPocsTable|\Cake\ORM\Association\HasMany $MasterClientPocs
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\MasterClient get($primaryKey, $options = [])
 * @method \App\Model\Entity\MasterClient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MasterClient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MasterClient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MasterClient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MasterClient findOrCreate($search, callable $callback = null, $options = [])
 */
class MasterClientsTable extends Table
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

        $this->setTable('master_clients');
        $this->setDisplayField('client_name');
        $this->setPrimaryKey('id');

        $this->hasMany('ClientVisites', [
            'foreignKey' => 'master_client_id'
        ]);
        $this->hasMany('MasterClientPocs', [
            'foreignKey' => 'master_client_id'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'master_client_id'
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
            ->scalar('client_name')
            ->maxLength('client_name', 200)
            ->requirePresence('client_name', 'create')
            ->notEmpty('client_name');

        $validator
            ->scalar('location')
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

       /* $validator
            ->dateTime('created_on')
            ->requirePresence('created_on', 'create')
            ->notEmpty('created_on');

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

        $validator
            ->dateTime('edited_on')
            ->requirePresence('edited_on', 'create')
            ->notEmpty('edited_on');

        $validator
            ->integer('edited_by')
            ->requirePresence('edited_by', 'create')
            ->notEmpty('edited_by');

        $validator
            ->integer('is_deleted')
            ->requirePresence('is_deleted', 'create')
            ->notEmpty('is_deleted');
*/
        return $validator;
    }
}

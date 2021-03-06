<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApiVersions Model
 *
 * @method \App\Model\Entity\ApiVersion get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApiVersion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ApiVersion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApiVersion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApiVersion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApiVersion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApiVersion findOrCreate($search, callable $callback = null, $options = [])
 */
class ApiVersionsTable extends Table
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

        $this->setTable('api_versions');
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->integer('version')
            ->requirePresence('version', 'create')
            ->notEmpty('version');

        return $validator;
    }
}

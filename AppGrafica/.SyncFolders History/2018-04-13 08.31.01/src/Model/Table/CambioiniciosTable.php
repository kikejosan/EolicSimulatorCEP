<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cambioinicios Model
 *
 * @method \App\Model\Entity\Cambioinicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cambioinicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cambioinicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cambioinicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cambioinicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cambioinicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cambioinicio findOrCreate($search, callable $callback = null, $options = [])
 */
class CambioiniciosTable extends Table
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

        $this->setTable('cambioinicios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('a1.systemNumber')
            ->requirePresence('a1.systemNumber', 'create')
            ->notEmpty('a1.systemNumber');

        $validator
            ->integer('a2.systemNumber')
            ->requirePresence('a2.systemNumber', 'create')
            ->notEmpty('a2.systemNumber');

        $validator
            ->integer('a3.systemNumber')
            ->requirePresence('a3.systemNumber', 'create')
            ->notEmpty('a3.systemNumber');

        $validator
            ->integer('a4.systemNumber')
            ->requirePresence('a4.systemNumber', 'create')
            ->notEmpty('a4.systemNumber');

        $validator
            ->integer('a5.systemNumber')
            ->requirePresence('a5.systemNumber', 'create')
            ->notEmpty('a5.systemNumber');

        $validator
            ->integer('a6.systemNumber')
            ->requirePresence('a6.systemNumber', 'create')
            ->notEmpty('a6.systemNumber');

        return $validator;
    }
}

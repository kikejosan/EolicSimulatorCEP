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
            ->integer('aero1')
            ->requirePresence('aero1', 'create')
            ->notEmpty('aero1');

        $validator
            ->integer('aero2')
            ->requirePresence('aero2', 'create')
            ->notEmpty('aero2');

        $validator
            ->integer('aero3')
            ->requirePresence('aero3', 'create')
            ->notEmpty('aero3');

        $validator
            ->integer('aero4')
            ->requirePresence('aero4', 'create')
            ->notEmpty('aero4');

        $validator
            ->integer('aero5')
            ->requirePresence('aero5', 'create')
            ->notEmpty('aero5');

        $validator
            ->integer('aero6')
            ->allowEmpty('aero6');

        return $validator;
    }
}

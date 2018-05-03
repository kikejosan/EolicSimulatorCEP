<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transicions Model
 *
 * @method \App\Model\Entity\Transicion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transicion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transicion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transicion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transicion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transicion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transicion findOrCreate($search, callable $callback = null, $options = [])
 */
class TransicionsTable extends Table
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

        $this->setTable('transicions');
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
            ->integer('subida1')
            ->requirePresence('subida1', 'create')
            ->notEmpty('subida1');

        $validator
            ->integer('aero2')
            ->requirePresence('aero2', 'create')
            ->notEmpty('aero2');

        $validator
            ->integer('subida2')
            ->requirePresence('subida2', 'create')
            ->notEmpty('subida2');

        $validator
            ->integer('aero3')
            ->requirePresence('aero3', 'create')
            ->notEmpty('aero3');

        $validator
            ->integer('subida3')
            ->requirePresence('subida3', 'create')
            ->notEmpty('subida3');

        return $validator;
    }
}
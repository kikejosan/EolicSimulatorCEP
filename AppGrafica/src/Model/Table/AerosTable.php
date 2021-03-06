<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Aeros Model
 *
 * @method \App\Model\Entity\Aero get($primaryKey, $options = [])
 * @method \App\Model\Entity\Aero newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Aero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Aero|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Aero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Aero[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Aero findOrCreate($search, callable $callback = null, $options = [])
 */
class AerosTable extends Table
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

        $this->setTable('aeros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('Parques');
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
            ->integer('SystemNumber')
            ->requirePresence('SystemNumber', 'create')
            ->notEmpty('SystemNumber');

        $validator
            ->integer('fila')
            ->requirePresence('fila', 'create')
            ->notEmpty('fila');

        $validator
            ->integer('columna')
            ->requirePresence('columna', 'create')
            ->notEmpty('columna');

        $validator
            ->scalar('idIngeboards')
            ->maxLength('idIngeboards', 11)
            ->requirePresence('idIngeboards', 'create')
            ->notEmpty('idIngeboards');

        $validator
            ->integer('id_parque')
            ->requirePresence('id_parque', 'create')
            ->notEmpty('id_parque');

        return $validator;
    }
}

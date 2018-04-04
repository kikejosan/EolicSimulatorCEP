<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parques Model
 *
 * @method \App\Model\Entity\Parque get($primaryKey, $options = [])
 * @method \App\Model\Entity\Parque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Parque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Parque|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Parque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Parque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Parque findOrCreate($search, callable $callback = null, $options = [])
 */
class ParquesTable extends Table
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

        $this->setTable('parques');
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
            ->scalar('Nombre')
            ->maxLength('Nombre', 20)
            ->requirePresence('Nombre', 'create')
            ->notEmpty('Nombre');

        $validator
            ->scalar('Lugar')
            ->maxLength('Lugar', 20)
            ->allowEmpty('Lugar');

        return $validator;
    }
}

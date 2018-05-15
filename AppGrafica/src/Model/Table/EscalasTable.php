<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Escalas Model
 *
 * @method \App\Model\Entity\Escala get($primaryKey, $options = [])
 * @method \App\Model\Entity\Escala newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Escala[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Escala|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Escala patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Escala[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Escala findOrCreate($search, callable $callback = null, $options = [])
 */
class EscalasTable extends Table
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

        $this->setTable('escalas');
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
            ->integer('systemNumber')
            ->allowEmpty('systemNumber');

        $validator
            ->integer('posicion')
            ->allowEmpty('posicion');

        $validator
            ->integer('fecha')
            ->allowEmpty('fecha');

        return $validator;
    }
}

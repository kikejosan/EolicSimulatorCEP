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
            ->integer('systemNumber')
            ->allowEmpty('systemNumber');

        $validator
            ->integer('posicionInicio')
            ->allowEmpty('posicionInicio');

        $validator
            ->integer('posicionFin')
            ->allowEmpty('posicionFin');

        $validator
            ->integer('variacion')
            ->allowEmpty('variacion');

        $validator
            ->date('inicio')
            ->allowEmpty('inicio');

        $validator
            ->date('fin')
            ->allowEmpty('fin');

        return $validator;
    }
}

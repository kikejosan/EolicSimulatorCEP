<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fueras Model
 *
 * @method \App\Model\Entity\Fuera get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fuera newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fuera[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fuera|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fuera patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fuera[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fuera findOrCreate($search, callable $callback = null, $options = [])
 */
class FuerasTable extends Table
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

        $this->setTable('fueras');
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
            ->integer('vecesFuera')
            ->allowEmpty('vecesFuera');

        $validator
            ->integer('viento')
            ->allowEmpty('viento');

        return $validator;
    }
}

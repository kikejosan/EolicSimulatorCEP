<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bajadaderendimientos Model
 *
 * @method \App\Model\Entity\Bajadaderendimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bajadaderendimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class BajadaderendimientosTable extends Table
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

        $this->setTable('bajadaderendimientos');
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
            ->integer('systemNumber1')
            ->allowEmpty('systemNumber1');

        $validator
            ->numeric('media1')
            ->allowEmpty('media1');

        $validator
            ->date('fecha1')
            ->allowEmpty('fecha1');

        $validator
            ->numeric('viento1')
            ->allowEmpty('viento1');

        $validator
            ->integer('systemNumber2')
            ->allowEmpty('systemNumber2');

        $validator
            ->numeric('media2')
            ->allowEmpty('media2');

        $validator
            ->date('fecha2')
            ->allowEmpty('fecha2');

        $validator
            ->numeric('viento2')
            ->allowEmpty('viento2');

        return $validator;
    }
}

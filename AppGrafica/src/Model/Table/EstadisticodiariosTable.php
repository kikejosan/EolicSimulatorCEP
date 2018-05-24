<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estadisticodiarios Model
 *
 * @method \App\Model\Entity\Estadisticodiario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estadisticodiario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estadisticodiario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estadisticodiario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estadisticodiario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estadisticodiario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estadisticodiario findOrCreate($search, callable $callback = null, $options = [])
 */
class EstadisticodiariosTable extends Table
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

        $this->setTable('estadisticodiarios');
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
            ->numeric('media')
            ->allowEmpty('media');

        $validator
            ->numeric('desviacion')
            ->allowEmpty('desviacion');

        $validator
            ->numeric('viento')
            ->allowEmpty('viento');

        $validator
            ->integer('veces')
            ->allowEmpty('veces');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        return $validator;
    }
}

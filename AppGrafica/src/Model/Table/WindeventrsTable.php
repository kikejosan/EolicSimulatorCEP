<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Windeventrs Model
 *
 * @method \App\Model\Entity\Windeventr get($primaryKey, $options = [])
 * @method \App\Model\Entity\Windeventr newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Windeventr[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Windeventr|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Windeventr patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Windeventr[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Windeventr findOrCreate($search, callable $callback = null, $options = [])
 */
class WindeventrsTable extends Table
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

        $this->setTable('windeventrs');
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
            ->numeric('power')
            ->allowEmpty('power');

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
            ->numeric('windSpeed')
            ->allowEmpty('windSpeed');

        $validator
            ->numeric('viento')
            ->allowEmpty('viento');

        $validator
            ->integer('veces')
            ->allowEmpty('veces');

        return $validator;
    }
}

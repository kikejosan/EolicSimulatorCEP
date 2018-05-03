<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rankingprods Model
 *
 * @method \App\Model\Entity\Rankingprod get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rankingprod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rankingprod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rankingprod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rankingprod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rankingprod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rankingprod findOrCreate($search, callable $callback = null, $options = [])
 */
class RankingprodsTable extends Table
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

        $this->setTable('rankingprods');
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
            ->date('time')
            ->allowEmpty('time');

        $validator
            ->numeric('suma')
            ->allowEmpty('suma');

        $validator
            ->numeric('productividad')
            ->allowEmpty('productividad');

        $validator
            ->integer('events')
            ->allowEmpty('events');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 22)
            ->allowEmpty('tipo');

        return $validator;
    }
}

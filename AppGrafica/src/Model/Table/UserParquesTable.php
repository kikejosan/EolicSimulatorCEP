<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserParques Model
 *
 * @method \App\Model\Entity\UserParque get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserParque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserParque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserParque|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserParque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserParque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserParque findOrCreate($search, callable $callback = null, $options = [])
 */
class UserParquesTable extends Table
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

        $this->setTable('user_parques');
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
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->notEmpty('id_user');

        $validator
            ->integer('id_parque')
            ->requirePresence('id_parque', 'create')
            ->notEmpty('id_parque');

        return $validator;
    }
}

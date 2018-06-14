<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificacions Model
 *
 * @method \App\Model\Entity\Notificacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notificacion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notificacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notificacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion findOrCreate($search, callable $callback = null, $options = [])
 */
class NotificacionsTable extends Table
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

        $this->setTable('notificacions');
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
            ->scalar('tipo')
            ->maxLength('tipo', 20)
            ->allowEmpty('tipo');
        
        $validator
            ->scalar('estado')
            ->maxLength('estado', 20)
            ->allowEmpty('estado');

        $validator
            ->integer('systemNumber')
            ->allowEmpty('systemNumber');

        $validator
            ->date('fecha')
            ->allowEmpty('fecha');

        $validator
            ->integer('campo1')
            ->allowEmpty('campo1');

        $validator
            ->integer('campo2')
            ->allowEmpty('campo2');

        $validator
            ->numeric('campo3')
            ->allowEmpty('campo3');

        $validator
            ->numeric('campo4')
            ->allowEmpty('campo4');

        $validator
            ->numeric('campo5')
            ->allowEmpty('campo5');

        return $validator;
    }
}

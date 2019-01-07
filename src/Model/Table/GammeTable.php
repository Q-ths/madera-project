<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gamme Model
 *
 * @property \App\Model\Table\TypeFinitionTable|\Cake\ORM\Association\BelongsTo $TypeFinition
 * @property \App\Model\Table\TypeIsolantTable|\Cake\ORM\Association\BelongsTo $TypeIsolant
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ModuleTable|\Cake\ORM\Association\HasMany $Module
 *
 * @method \App\Model\Entity\Gamme get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gamme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gamme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gamme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gamme|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gamme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gamme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gamme findOrCreate($search, callable $callback = null, $options = [])
 */
class GammeTable extends Table
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

        $this->setTable('gamme');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeFinition', [
            'foreignKey' => 'type_finition_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypeIsolant', [
            'foreignKey' => 'type_isolant_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Module', [
            'foreignKey' => 'gamme_id'
        ]);
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
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->dateTime('derniere_date_modification')
            ->allowEmpty('derniere_date_modification');

        $validator
            ->dateTime('date_in')
            ->allowEmpty('date_in');

        $validator
            ->dateTime('date_out')
            ->allowEmpty('date_out');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['type_finition_id'], 'TypeFinition'));
        $rules->add($rules->existsIn(['type_isolant_id'], 'TypeIsolant'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\DatabaseTrait\FindOrderByActivate;
use App\Model\DatabaseTrait\FindEnable;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeFinition Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GammeTable|\Cake\ORM\Association\HasMany $Gamme
 *
 * @method \App\Model\Entity\TypeFinition get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeFinition newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeFinition[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeFinition|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeFinition|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeFinition patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeFinition[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeFinition findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeFinitionTable extends Table
{

    use FindEnable;
    use FindOrderByActivate;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('type_finition');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Gamme', [
            'foreignKey' => 'type_finition_id'
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

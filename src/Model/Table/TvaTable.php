<?php
namespace App\Model\Table;

use App\Model\DatabaseTrait\FindEnable;
use App\Model\DatabaseTrait\FindOrderByActivate;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tva Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComposantTable|\Cake\ORM\Association\HasMany $Composant
 *
 * @method \App\Model\Entity\Tva get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tva newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tva[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tva|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tva|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tva[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tva findOrCreate($search, callable $callback = null, $options = [])
 */
class TvaTable extends Table
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

        $this->setTable('tva');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Composant', [
            'foreignKey' => 'tva_id'
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
            ->numeric('pourcentage_tva')
            ->requirePresence('pourcentage_tva', 'create')
            ->notEmpty('pourcentage_tva');

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

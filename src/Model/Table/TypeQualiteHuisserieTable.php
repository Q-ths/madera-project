<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeQualiteHuisserie Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GammeTable|\Cake\ORM\Association\HasMany $Gamme
 *
 * @method \App\Model\Entity\TypeQualiteHuisserie get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeQualiteHuisserie findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeQualiteHuisserieTable extends Table
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

        $this->setTable('type_qualite_huisserie');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Gamme', [
            'foreignKey' => 'type_qualite_huisserie_id'
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
            ->requirePresence('derniere_date_modification', 'create')
            ->notEmpty('derniere_date_modification');

        $validator
            ->dateTime('date_in')
            ->requirePresence('date_in', 'create')
            ->notEmpty('date_in');

        $validator
            ->dateTime('date_out')
            ->requirePresence('date_out', 'create')
            ->notEmpty('date_out');

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

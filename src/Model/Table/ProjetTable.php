<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projet Model
 *
 * @property \App\Model\Table\ClientTable|\Cake\ORM\Association\BelongsTo $Client
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\HasMany $Devis
 * @property \App\Model\Table\ModuleTable|\Cake\ORM\Association\BelongsToMany $Module
 *
 * @method \App\Model\Entity\Projet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projet findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjetTable extends Table
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

        $this->setTable('projet');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Client', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasOne('Responsable', [
            'className' => 'Users',
            'bindingKey' => 'utilisateur_id',
            'foreignKey' => 'id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Devis', [
            'foreignKey' => 'projet_id'
        ]);
        $this->belongsToMany('Module', [
            'foreignKey' => 'projet_id',
            'targetForeignKey' => 'module_id',
            'joinTable' => 'module_projet'
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
            ->dateTime('date_creation')
            ->requirePresence('date_creation', 'create')
            ->notEmpty('date_creation');

        $validator
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->dateTime('derniere_date_modification')
            ->allowEmpty('derniere_date_modification');

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
        $rules->add($rules->existsIn(['client_id'], 'Client'));
        $rules->add($rules->existsIn(['utilisateur_id'], 'Users'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

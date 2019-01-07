<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Droit Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $ApplicationModule
 * @property \App\Model\Table\ProfilTable|\Cake\ORM\Association\BelongsToMany $Profil
 *
 * @method \App\Model\Entity\Droit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Droit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Droit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Droit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Droit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Droit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Droit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Droit findOrCreate($search, callable $callback = null, $options = [])
 */
class DroitTable extends Table
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

        $this->setTable('droit');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ApplicationModule', [
            'foreignKey' => 'application_module_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Profil', [
            'foreignKey' => 'droit_id',
            'targetForeignKey' => 'profil_id',
            'joinTable' => 'profil_droit'
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
            ->integer('valeur')
            ->requirePresence('valeur', 'create')
            ->notEmpty('valeur');

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
        $rules->add($rules->existsIn(['application_module_id'], 'ApplicationModule'));

        return $rules;
    }
}

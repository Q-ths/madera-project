<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProfilDroit Model
 *
 * @property \App\Model\Table\ProfilTable|\Cake\ORM\Association\BelongsTo $Profil
 * @property \App\Model\Table\DroitTable|\Cake\ORM\Association\BelongsTo $Droit
 *
 * @method \App\Model\Entity\ProfilDroit get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProfilDroit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProfilDroit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProfilDroit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfilDroit|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProfilDroit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProfilDroit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProfilDroit findOrCreate($search, callable $callback = null, $options = [])
 */
class ProfilDroitTable extends Table
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

        $this->setTable('profil_droit');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Profil', [
            'foreignKey' => 'profil_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Droit', [
            'foreignKey' => 'droit_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['profil_id'], 'Profil'));
        $rules->add($rules->existsIn(['droit_id'], 'Droit'));

        return $rules;
    }
}

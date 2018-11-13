<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EchelonnementPayement Model
 *
 * @property \App\Model\Table\TypeEchelonnementPayementTable|\Cake\ORM\Association\BelongsTo $TypeEchelonnementPayement
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\BelongsTo $Devis
 *
 * @method \App\Model\Entity\EchelonnementPayement get($primaryKey, $options = [])
 * @method \App\Model\Entity\EchelonnementPayement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EchelonnementPayement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EchelonnementPayement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EchelonnementPayement|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EchelonnementPayement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EchelonnementPayement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EchelonnementPayement findOrCreate($search, callable $callback = null, $options = [])
 */
class EchelonnementPayementTable extends Table
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

        $this->setTable('echelonnement_payement');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeEchelonnementPayement', [
            'foreignKey' => 'type_echelonnement_payement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Devis', [
            'foreignKey' => 'devis_id',
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
        $rules->add($rules->existsIn(['type_echelonnement_payement_id'], 'TypeEchelonnementPayement'));
        $rules->add($rules->existsIn(['devis_id'], 'Devis'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeEchelonnementPayement Model
 *
 * @property \App\Model\Table\EchelonnementPayementTable|\Cake\ORM\Association\HasMany $EchelonnementPayement
 *
 * @method \App\Model\Entity\TypeEchelonnementPayement get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeEchelonnementPayement findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeEchelonnementPayementTable extends Table
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

        $this->setTable('type_echelonnement_payement');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('EchelonnementPayement', [
            'foreignKey' => 'type_echelonnement_payement_id'
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
            ->scalar('libelle')
            ->requirePresence('libelle', 'create')
            ->notEmpty('libelle');

        $validator
            ->numeric('pourcentage_payement')
            ->requirePresence('pourcentage_payement', 'create')
            ->notEmpty('pourcentage_payement');

        return $validator;
    }
}

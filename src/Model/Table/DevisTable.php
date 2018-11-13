<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Devis Model
 *
 * @property \App\Model\Table\ProjetTable|\Cake\ORM\Association\BelongsTo $Projet
 * @property \App\Model\Table\TypeStatutTable|\Cake\ORM\Association\BelongsTo $TypeStatut
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Devi get($primaryKey, $options = [])
 * @method \App\Model\Entity\Devi newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Devi[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Devi|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Devi|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Devi patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Devi[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Devi findOrCreate($search, callable $callback = null, $options = [])
 */
class DevisTable extends Table
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

        $this->setTable('devis');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projet', [
            'foreignKey' => 'projet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypeStatut', [
            'foreignKey' => 'type_statut_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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

        $validator
            ->scalar('client_nom')
            ->requirePresence('client_nom', 'create')
            ->notEmpty('client_nom');

        $validator
            ->scalar('client_prenom')
            ->requirePresence('client_prenom', 'create')
            ->notEmpty('client_prenom');

        $validator
            ->integer('adresse_numero')
            ->requirePresence('adresse_numero', 'create')
            ->notEmpty('adresse_numero');

        $validator
            ->scalar('adresse')
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->integer('code_postal')
            ->requirePresence('code_postal', 'create')
            ->notEmpty('code_postal');

        $validator
            ->scalar('ville')
            ->requirePresence('ville', 'create')
            ->notEmpty('ville');

        $validator
            ->decimal('pourcentage_remise')
            ->requirePresence('pourcentage_remise', 'create')
            ->notEmpty('pourcentage_remise');

        $validator
            ->decimal('prix_total_ttc')
            ->requirePresence('prix_total_ttc', 'create')
            ->notEmpty('prix_total_ttc');

        $validator
            ->decimal('prix_total_ht')
            ->requirePresence('prix_total_ht', 'create')
            ->notEmpty('prix_total_ht');

        $validator
            ->dateTime('derniere_date_modification')
            ->requirePresence('derniere_date_modification', 'create')
            ->notEmpty('derniere_date_modification');

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
        $rules->add($rules->existsIn(['projet_id'], 'Projet'));
        $rules->add($rules->existsIn(['type_statut_id'], 'TypeStatut'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

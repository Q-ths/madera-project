<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeStatut Model
 *
 * @property \App\Model\Table\DevisTable|\Cake\ORM\Association\HasMany $Devis
 *
 * @method \App\Model\Entity\TypeStatut get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeStatut newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeStatut[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeStatut|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeStatut|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeStatut patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeStatut[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeStatut findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeStatutTable extends Table
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

        $this->setTable('type_statut');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Devis', [
            'foreignKey' => 'type_statut_id'
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

        return $validator;
    }
}

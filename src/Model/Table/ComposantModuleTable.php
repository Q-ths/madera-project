<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ComposantModule Model
 *
 * @property \App\Model\Table\ModuleTable|\Cake\ORM\Association\BelongsTo $Module
 * @property \App\Model\Table\ComposantTable|\Cake\ORM\Association\BelongsTo $Composant
 *
 * @method \App\Model\Entity\ComposantModule get($primaryKey, $options = [])
 * @method \App\Model\Entity\ComposantModule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ComposantModule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ComposantModule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ComposantModule|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ComposantModule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ComposantModule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ComposantModule findOrCreate($search, callable $callback = null, $options = [])
 */
class ComposantModuleTable extends Table
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

        $this->setTable('composant_module');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Module', [
            'foreignKey' => 'module_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Composant', [
            'foreignKey' => 'composant_id',
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
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmpty('quantite');

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
        $rules->add($rules->existsIn(['module_id'], 'Module'));
        $rules->add($rules->existsIn(['composant_id'], 'Composant'));

        return $rules;
    }
}

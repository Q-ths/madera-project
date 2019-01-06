<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\DatabaseTrait\FindEnable;
use App\Model\DatabaseTrait\FindOrderByActivate;


/**
 * Module Model
 *
 * @property \App\Model\Table\GammeTable|\Cake\ORM\Association\BelongsTo $Gamme
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ComposantTable|\Cake\ORM\Association\BelongsToMany $Composant
 * @property \App\Model\Table\ProjetTable|\Cake\ORM\Association\BelongsToMany $Projet
 *
 * @method \App\Model\Entity\Module get($primaryKey, $options = [])
 * @method \App\Model\Entity\Module newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Module[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Module|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Module|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Module patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Module[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Module findOrCreate($search, callable $callback = null, $options = [])
 */
class ModuleTable extends Table
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

        $this->setTable('module');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Gamme', [
            'foreignKey' => 'gamme_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Composant', [
            'foreignKey' => 'module_id',
            'targetForeignKey' => 'composant_id',
            'joinTable' => 'composant_module'
        ]);
        $this->belongsToMany('Projet', [
            'foreignKey' => 'module_id',
            'targetForeignKey' => 'projet_id',
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
            ->scalar('nom')
            ->requirePresence('nom', 'create')
            ->notEmpty('nom');

        $validator
            ->numeric('marge')
            ->requirePresence('marge', 'create')
            ->notEmpty('marge');

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
        $rules->add($rules->existsIn(['gamme_id'], 'Gamme'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}

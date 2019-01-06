<?php
use Migrations\AbstractMigration;

class CreateModuleComposantProjet extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 0');

        $this
            ->table('module_composant_projet')
            ->addColumn('nom','text',['null' => false])
            ->addColumn('prix_achat','float',['null' => false])
            ->addColumn('pourcentage_marge','float',['null' => false])
            ->addColumn('tva','float',['null' => false])
            ->addColumn('quantite', 'integer', ['null' => true,'default' => null])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->addColumn('module_projet_id','integer',['null' => false])
            ->addForeignKey('module_projet_id','module_projet','id',['delete' => 'restrict','update' => 'restrict'])
            ->create();
    }
}

<?php
use Migrations\AbstractMigration;

class CreateComposant extends AbstractMigration
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
        $this->table('composant')
            ->addColumn('famille_composant_id','integer', ['null' => true,'default' => null])
            ->addForeignKey('famille_composant_id', 'famille_composant','id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('tva_id','integer', ['null' => false])
            ->addForeignKey('tva_id', 'tva','id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('fournisseur_id','integer', ['null' => false])
            ->addForeignKey('fournisseur_id', 'fournisseur','id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('nom','text',['null' => false])
            ->addColumn('prix_achat', 'decimal',['null' => false])
            ->addColumn('pourcentage_marge','decimal',['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => null])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->create();
    }
}

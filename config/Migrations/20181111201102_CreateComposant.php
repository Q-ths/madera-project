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
        $table = $this->table('composant');

        $table->addColumn('famille_composant_id','integer', ['null' => true]);
        $table->addForeignKey('famille_composant_id', 'famille_composant','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('tva_id','integer', ['null' => false]);
        $table->addForeignKey('tva_id', 'tva','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('fournisseur_id','integer', ['null' => false]);
        $table->addForeignKey('fournisseur_id', 'fournisseur','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('nom','text',['null' => false]);

        $table->addColumn('prix_achat', 'decimal',['null' => false]);

        $table->addColumn('pourcentage_marge','decimal',['null' => false]);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->addColumn('date_in','datetime',['null' => false]);

        $table->addColumn('date_out','datetime',['null' => false]);

        $table->create();
    }
}

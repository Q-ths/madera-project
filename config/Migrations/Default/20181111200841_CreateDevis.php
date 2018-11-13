<?php
use Migrations\AbstractMigration;

class CreateDevis extends AbstractMigration
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
        $table = $this->table('devis');

        $table->addColumn('projet_id','integer', ['null' => false]);
        $table->addForeignKey('projet_id', 'projet', 'id', ['update' => 'restrict', 'delete' => 'restrict']);

        $table->addColumn('type_statut_id','integer', ['null' => false]);
        $table->addForeignKey('type_statut_id', 'type_statut', 'id', ['update' => 'restrict', 'delete' => 'restrict']);

        $table->addColumn('client_nom','text', [
            'null' => false
        ]);

        $table->addColumn('client_prenom','text',[
            'null' => false
        ]);

        $table->addColumn('adresse_numero','integer', [
            'null' => false
        ]);

        $table->addColumn('adresse', 'text', [
            'null' => false
        ]);

        $table->addColumn('code_postal', 'integer', [
            'null' => false
        ]);

        $table->addColumn('ville', 'text', [
            'null' => false
        ]);

        $table->addColumn('pourcentage_remise', 'decimal', [
            'null' => false
        ]);

        $table->addColumn('prix_total_ttc', 'decimal', [
            'null' => false
        ]);

        $table->addColumn('prix_total_ht', 'decimal', [
            'null' => false
        ]);

        $table->addColumn('user_id', 'integer', [
            'null' => false
        ]);

        $table->addColumn('derniere_date_modification', 'datetime', [
            'null' => false
        ]);

        $table->create();
    }
}

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
        $this->table('devis')
            ->addColumn('projet_id','integer', ['null' => false])
            ->addForeignKey('projet_id', 'projet', 'id', ['update' => 'restrict', 'delete' => 'restrict'])
            ->addColumn('type_statut_id','integer', ['null' => false])
            ->addForeignKey('type_statut_id', 'type_statut', 'id', ['update' => 'restrict', 'delete' => 'restrict'])
            ->addColumn('client_nom','text', ['null' => false])
            ->addColumn('client_prenom','text',['null' => false])
            ->addColumn('adresse_numero','integer', ['null' => false])
            ->addColumn('adresse', 'text', ['null' => false])
            ->addColumn('code_postal', 'integer', ['null' => false])
            ->addColumn('ville', 'text', ['null' => false])
            ->addColumn('pourcentage_remise', 'float', ['null' => false])
            ->addColumn('prix_total_ttc', 'float', ['null' => false])
            ->addColumn('prix_total_ht', 'float', ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true, 'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true, 'default' => null])
            ->create();
    }
}

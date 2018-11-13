<?php
use Migrations\AbstractMigration;

class CreateTypeEchelonnementPayement extends AbstractMigration
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
        $table = $this->table('type_echelonnement_payement');

        $table->addColumn('libelle','text', [
            'null' => false
        ]);
        $table->addColumn('pourcentage_payement', 'decimal', ['null' => false]);

        $table->create();
    }
}

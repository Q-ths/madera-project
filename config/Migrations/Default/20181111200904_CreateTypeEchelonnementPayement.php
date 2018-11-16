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
        $this->table('type_echelonnement_payement')
            ->addColumn('libelle','text', ['null' => false])
            ->addColumn('pourcentage_payement', 'decimal', ['null' => false])
            ->create();
    }
}

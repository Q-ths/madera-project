<?php
use Migrations\AbstractMigration;

class CreateTypeStatut extends AbstractMigration
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
        $this->table('type_statut')
            ->addColumn('libelle','text',['null' => false])
            ->create();
    }
}

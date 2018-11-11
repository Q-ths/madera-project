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
        $table = $this->table('type_statut');

        $table->addColumn('libelle','text',['null' => false]);

        $table->create();
    }
}

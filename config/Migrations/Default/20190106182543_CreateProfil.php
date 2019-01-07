<?php
use Migrations\AbstractMigration;

class CreateProfil extends AbstractMigration
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
        $table = $this->table('profil');
        $table->addColumn('nom','text',['null' => false]);
        $table->create();
    }
}

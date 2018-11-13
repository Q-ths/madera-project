<?php
use Migrations\AbstractMigration;

class CreateUser extends AbstractMigration
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
        $table = $this->table('user');

        $table
            ->addColumn('email','text', ['null' => false])
            ->addColumn('password','varchar', ['null' => false, 'length' => 25])
            ->addColumn('nom', 'text', ['null' => false])
            ->addColumn('prenom', 'text', ['null' => false])
            ->addColumn('poste', 'varchar', ['null' => false]);

        $table->create();
    }
}

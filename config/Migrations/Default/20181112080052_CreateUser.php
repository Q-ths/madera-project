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
        $this->table('user')
            ->addColumn('email','text', ['null' => false])
            ->addColumn('password','string', ['null' => false, 'length' => 25])
            ->addColumn('nom', 'text', ['null' => false])
            ->addColumn('prenom', 'text', ['null' => false])
            ->addColumn('poste', 'string', ['null' => false, 'length' => 255])
            ->create();
    }
}

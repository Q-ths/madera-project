<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $this->table('users')
            ->addColumn('email','text', ['null' => false])
            ->addColumn('password','text', ['null' => false])
            ->addColumn('nom', 'text', ['null' => false])
            ->addColumn('prenom', 'text', ['null' => false])
            ->addColumn('profil_id','integer',['null' => false])
            ->addForeignKey('profil_id','profil','id',['update' => 'restrict','delete' => 'restrict'])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->create();
    }
}

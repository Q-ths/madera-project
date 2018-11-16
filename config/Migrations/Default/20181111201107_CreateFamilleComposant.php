<?php
use Migrations\AbstractMigration;

class CreateFamilleComposant extends AbstractMigration
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
         $this->table('famille_composant')
             ->addColumn('nom','text',['null' => false])
             ->addColumn('user_id', 'integer', ['null' => true])
             ->addColumn('derniere_date_modification', 'datetime', ['null' => true])
             ->addColumn('date_in','datetime',['null' => true])
             ->addColumn('date_out','datetime',['null' => true])
             ->create();
    }
}

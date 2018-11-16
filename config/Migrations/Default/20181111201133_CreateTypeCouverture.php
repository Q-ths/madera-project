<?php
use Migrations\AbstractMigration;

class CreateTypeCouverture extends AbstractMigration
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
         $this->table('type_couverture')
            ->addColumn('nom','text',['null' => false])
            ->addColumn('user_id', 'integer', ['null' => false])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => false])
            ->addColumn('date_in','datetime',['null' => false])
            ->addColumn('date_out','datetime',['null' => false])
            ->create();
    }
}

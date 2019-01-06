<?php
use Migrations\AbstractMigration;

class CreateGamme extends AbstractMigration
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
         $this->table('gamme')
            ->addColumn('nom','text',['null' => false])
            ->addColumn('type_finition_id', 'integer', ['null' => false])
            ->addForeignKey('type_finition_id','type_finition','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('type_isolant_id', 'integer',['null' => true,'default' => null])
            ->addForeignKey('type_isolant_id','type_isolant','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->create();
    }
}

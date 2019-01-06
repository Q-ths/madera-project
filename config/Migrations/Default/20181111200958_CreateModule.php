<?php
use Migrations\AbstractMigration;

class CreateModule extends AbstractMigration
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
        $this->table('module')
            ->addColumn('gamme_id','integer',['null' => true])
            ->addForeignKey('gamme_id', 'gamme', 'id',  ['delete' => 'restrict','delete' => 'restrict'])
            ->addColumn('nom','text',['null' => false])
            ->addColumn('marge', 'float',  ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => 'CURRENT_TIMESTAMP',])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->create();
    }
}

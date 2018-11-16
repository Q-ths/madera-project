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
            ->addColumn('projet_id','integer',['null' => false])
            ->addForeignKey('projet_id', 'projet', 'id',  ['delete' => 'restrict','delete' => 'restrict'])
            ->addColumn('cctp_id','integer',['null' => true])
            ->addForeignKey('cctp_id', 'cctp', 'id',  ['delete' => 'restrict','delete' => 'restrict'])
            ->addColumn('gamme_id','integer',['null' => true])
            ->addForeignKey('gamme_id', 'gamme', 'id',  ['delete' => 'restrict','delete' => 'restrict'])
            ->addColumn('coupe_principe_id','integer',['null' => true])
            ->addForeignKey('coupe_principe_id', 'coupe_principe', 'id',  ['delete' => 'restrict','delete' => 'restrict'])
            ->addColumn('nom','text',['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true])
            ->addColumn('date_in','datetime',['null' => true])
            ->addColumn('date_out','datetime',['null' => true])
            ->create();
    }
}

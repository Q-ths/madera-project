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
        $table = $this->table('module');

        $table->addColumn('projet_id','integer',['null' => false]);
        $table->addForeignKey('projet_id', 'projet', 'id',  ['delete' => 'restrict','delete' => 'restrict']);

        $table->addColumn('cctp_id','integer',['null' => true]);
        $table->addForeignKey('cctp_id', 'cctp', 'id',  ['delete' => 'restrict','delete' => 'restrict']);

        $table->addColumn('gamme_id','integer',['null' => true]);
        $table->addForeignKey('gamme_id', 'gamme', 'id',  ['delete' => 'restrict','delete' => 'restrict']);

        $table->addColumn('coupe_principe_id','integer',['null' => true]);
        $table->addForeignKey('coupe_principe_id', 'coupe_principe', 'id',  ['delete' => 'restrict','delete' => 'restrict']);

        $table->addColumn('nom','text',['null' => false]);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->addColumn('date_in','datetime',['null' => false]);

        $table->addColumn('date_out','datetime',['null' => false]);

        $table->create();
    }
}

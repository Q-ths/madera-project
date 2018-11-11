<?php
use Migrations\AbstractMigration;

class CreateProjet extends AbstractMigration
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
        $table = $this->table('projet');

        $table->addColumn('client_id', 'integer', ['null' => false]);
        $table->addForeignKey('client_id','client','id',['update' => 'restrict', 'delete' => 'restrict']);

        $table->addColumn('reference','string', ['null' => false, 'length'=> 25]);

        $table->addColumn('date_creation','datetime', ['null' => false]);

        $table->addColumn('nom','text', ['null' => false]);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->create();
    }
}

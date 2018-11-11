<?php
use Migrations\AbstractMigration;

class CreateSection extends AbstractMigration
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
        $table = $this->table('section');

        $table->addColumn('module_id','integer', ['null' => false]);
        $table->addForeignKey('module_id', 'module','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('longueur','decimal',['null' => false]);

        $table->addColumn('angle_entrant','decimal',['null' => false]);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->addColumn('date_in','datetime',['null' => false]);

        $table->addColumn('date_out','datetime',['null' => false]);

        $table->create();
    }
}

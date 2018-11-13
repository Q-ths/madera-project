<?php
use Migrations\AbstractMigration;

class CreateTypeQualiteHuisserie extends AbstractMigration
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
        $table = $this->table('type_qualite_huisserie');

        $table->addColumn('nom','text',['null' => false]);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->addColumn('date_in','datetime',['null' => false]);

        $table->addColumn('date_out','datetime',['null' => false]);

        $table->create();
    }
}

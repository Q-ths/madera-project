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
        $table = $this->table('gamme');

        $table->addColumn('nom','text',['null' => false]);

        $table->addColumn('type_finission_exterieur_id', 'integer', ['null' => false]);
        $table->addForeignKey('type_finission_exterieur_id','type_finission_exterieur','id',['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('type_isolant_id', 'integer',['null' => true]);
        $table->addForeignKey('type_isolant_id','type_isolant','id',['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('type_couverture_id', 'integer',['null' => true]);
        $table->addForeignKey('type_couverture_id','type_couverture','id',['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('type_qualite_huisserie_id', 'integer',['null' => true]);
        $table->addForeignKey('type_qualite_huisserie_id','type_qualite_huisserie','id',['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('user_id', 'integer', ['null' => false]);

        $table->addColumn('derniere_date_modification', 'datetime', ['null' => false]);

        $table->addColumn('date_in','datetime',['null' => false]);

        $table->addColumn('date_out','datetime',['null' => false]);

        $table->create();
    }
}

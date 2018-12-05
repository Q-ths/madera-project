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
            ->addColumn('type_finission_exterieur_id', 'integer', ['null' => false])
            ->addForeignKey('type_finission_exterieur_id','type_finission_exterieur','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('type_isolant_id', 'integer',['null' => true,'default' => null])
            ->addForeignKey('type_isolant_id','type_isolant','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('type_couverture_id', 'integer',['null' => true,'default' => null])
            ->addForeignKey('type_couverture_id','type_couverture','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('type_qualite_huisserie_id', 'integer',['null' => true,'default' => null])
            ->addForeignKey('type_qualite_huisserie_id','type_qualite_huisserie','id',['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => null])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->create();
    }
}

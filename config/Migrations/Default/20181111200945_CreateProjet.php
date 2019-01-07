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
         $this->table('projet')
            ->addColumn('client_id', 'integer', ['null' => false])
            ->addForeignKey('client_id','client','id',['update' => 'restrict', 'delete' => 'restrict'])
            ->addColumn('utilisateur_id','integer',['null' => false])
             ->addForeignKey('utilisateur_id','users','id',['update' => 'restrict', 'delete' => 'restrict'])
            ->addColumn('reference','string', ['null' => false, 'length'=> 25])
            ->addColumn('date_creation','datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('nom','text', ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->create();
    }
}

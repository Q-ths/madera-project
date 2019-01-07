<?php
use Migrations\AbstractMigration;

class CreateDroit extends AbstractMigration
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
        $table = $this->table('droit');
        $table->addColumn('nom','text',['null' => false]);
        $table->addColumn('valeur','integer',['null' => false]);
        $table->addColumn('application_module_id','integer',['null' => false]);
        $table->addForeignKey('application_module_id','application_module','id',['update' => 'restrict','delete' => 'restrict']);
        $table->create();
    }
}

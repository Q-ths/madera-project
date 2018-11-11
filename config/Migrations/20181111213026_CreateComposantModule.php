<?php
use Migrations\AbstractMigration;

class CreateComposantModule extends AbstractMigration
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
        $table = $this->table('composant_module');

        $table->addColumn('module_id','integer', ['null' => false]);
        $table->addForeignKey('module_id','module','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->addColumn('composant_id','integer', ['null' => false]);
        $table->addForeignKey('composant_id','composant','id', ['delete' => 'restrict', 'update' => 'restrict']);

        $table->create();

        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 1');
    }
}

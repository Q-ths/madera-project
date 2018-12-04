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
        $this->table('composant_module')
            ->addColumn('module_id','integer', ['null' => false])
            ->addForeignKey('module_id','module','id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->addColumn('composant_id','integer', ['null' => false])
            ->addForeignKey('composant_id','composant','id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->create();
    }
}

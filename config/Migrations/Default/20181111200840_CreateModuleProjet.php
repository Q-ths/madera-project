<?php
use Migrations\AbstractMigration;

class CreateModuleProjet extends AbstractMigration
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
        $this
            ->table('module_projet')
            ->addColumn('nom','text', ['null' => false])
            ->addColumn('marge', 'integer',  ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true,'default' => null])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true,'default' => null])
            ->addColumn('date_in','datetime',['null' => true,'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('date_out','datetime',['null' => true,'default' => null])
            ->addColumn('projet_id', 'integer',  ['null' => false])
            ->addForeignKey('projet_id', 'projet', 'id', ['delete' => 'restrict', 'update' => 'restrict'])
            ->create();
    }
}

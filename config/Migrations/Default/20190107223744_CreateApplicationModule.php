<?php
use Migrations\AbstractMigration;

class CreateApplicationModule extends AbstractMigration
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
        $table = $this->table('application_module');
        $table->addColumn('nom','text',['null' => false]);
        $table->create();

        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 1');
    }
}

<?php
use Migrations\AbstractMigration;

class CreateProfilDroit extends AbstractMigration
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
        $table = $this->table('profil_droit');
        $table->addColumn('profil_id','integer',['null' => false]);
        $table->addForeignKey('profil_id','profil','id',['update' => 'restrict','delete' => 'restrict']);
        $table->addColumn('droit_id','integer',['null' => false]);
        $table->addForeignKey('droit_id','droit','id',['update' => 'restrict','delete' => 'restrict']);
        $table->create();
    }
}

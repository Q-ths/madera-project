<?php
use Migrations\AbstractMigration;

class CreateElement extends AbstractMigration
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
        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 0');

         $this->table('element')
            ->addColumn('devis_id', 'integer', ['null' => false])
            ->addForeignKey('devis_id','devis','id', ['update' => 'RESTRICT', 'delete' => 'RESTRICT'])
            ->addColumn('libelle_module','text', ['null' => false,])
            ->addColumn('cctp','text', ['null' => false,])
            ->addColumn('unite','integer', ['null' => false,])
            ->addColumn('quanite','integer', ['null' => false,])
            ->addColumn('coupe_principe','text', ['null' => false,])
            ->addColumn('prix_ht','decimal', ['null' => false,])
            ->addColumn('tva','decimal', ['null' => false,])
            ->create();
    }
}

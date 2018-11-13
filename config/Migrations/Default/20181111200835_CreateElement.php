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

        $table = $this->table('element');

        $table->addColumn('devis_id', 'integer', [
            'null' => false
        ]);
        $table->addForeignKey('devis_id','devis','id', ['update' => 'RESTRICT', 'delete' => 'RESTRICT']);

        $table->addColumn('libelle_module','text', [
            'null' => false,
        ]);

        $table->addColumn('cctp','text', [
            'null' => false,
        ]);

        $table->addColumn('unite','integer', [
            'null' => false,
        ]);

        $table->addColumn('quanite','integer', [
            'null' => false,
        ]);

        $table->addColumn('coupe_principe','text', [
            'null' => false,
        ]);

        $table->addColumn('prix_ht','decimal', [
            'null' => false,
        ]);

        $table->addColumn('tva','decimal', [
            'null' => false,
        ]);

        $table->create();
    }
}

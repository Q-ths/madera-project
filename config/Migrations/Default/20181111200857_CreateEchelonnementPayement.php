<?php
use Migrations\AbstractMigration;

class CreateEchelonnementPayement extends AbstractMigration
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
        $table = $this->table('echelonnement_payement');

        $table->addColumn('type_echelonnement_payement_id','integer',[
            'null' => false
        ]);
        $table->addForeignKey('type_echelonnement_payement_id','type_echelonnement_payement','id', ['update' => 'restrict','delete' => 'restrict']);

        $table->addColumn('devis_id','integer',[
            'null' => false
        ]);
        $table->addForeignKey('devis_id','devis','id', ['update' => 'restrict','delete' => 'restrict']);

        $table->create();
    }
}

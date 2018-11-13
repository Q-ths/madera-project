<?php
use Migrations\AbstractMigration;

class CreateClient extends AbstractMigration
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
        $table = $this->table('client');

        $table->addColumn('nom','text', [
            'null' => false
        ]);

        $table->addColumn('prenom','text',[
            'null' => false
        ]);

        $table->addColumn('adresse_numero','integer', [
            'null' => false
        ]);

        $table->addColumn('adresse', 'text', [
            'null' => false
        ]);

        $table->addColumn('code_postal', 'integer', [
            'null' => false
        ]);

        $table->addColumn('ville', 'text', [
            'null' => false
        ]);

        $table->addColumn('email', 'text', [
            'null' => false
        ]);

        $table->addColumn('telephone', 'integer', [
            'null' => false
        ]);

        $table->addColumn('user_id', 'integer', [
            'null' => false
        ]);

        $table->addColumn('derniere_date_modification', 'datetime', [
            'null' => false
        ]);

        $table->create();
    }
}

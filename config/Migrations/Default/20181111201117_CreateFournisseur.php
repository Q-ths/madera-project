<?php
use Migrations\AbstractMigration;

class CreateFournisseur extends AbstractMigration
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
        $this->table('fournisseur')
            ->addColumn('nom','text', ['null' => false])
            ->addColumn('prenom','text',['null' => false])
            ->addColumn('adresse_numero','integer', ['null' => false])
            ->addColumn('adresse', 'text', ['null' => false])
            ->addColumn('code_postal', 'integer', ['null' => false])
            ->addColumn('ville', 'text', ['null' => false])
            ->addColumn('email', 'text', ['null' => false])
            ->addColumn('telephone', 'integer', ['null' => false])
            ->addColumn('user_id', 'integer', ['null' => true])
            ->addColumn('derniere_date_modification', 'datetime', ['null' => true])
            ->create();
    }
}

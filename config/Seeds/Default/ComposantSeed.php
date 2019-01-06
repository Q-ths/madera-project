<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class ComposantSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'famille_composant_id' => 3,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Gougeons métallique x100',
                'prix_achat' => 5.99,
                'pourcentage_marge' => 15,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 3,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Boulons x100',
                'prix_achat' => 1.99,
                'pourcentage_marge' => 15,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 3,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Sabots x100',
                'prix_achat' => 3.99,
                'pourcentage_marge' => 15,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 1,
                'tva_id' => 1,
                'fournisseur_id' => 2,
                'nom' => 'Contrefort 15x10 unité',
                'prix_achat' => 35.99,
                'pourcentage_marge' => 10,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 2,
                'tva_id' => 1,
                'fournisseur_id' => 2,
                'nom' => 'Lisses 15x10 unité',
                'prix_achat' => 25.99,
                'pourcentage_marge' => 10,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 1,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Contrefort 15x10 unité',
                'prix_achat' => 35.99,
                'pourcentage_marge' => 10,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
            [
                'famille_composant_id' => 2,
                'tva_id' => 1,
                'fournisseur_id' => 1,
                'nom' => 'Lisses 15x10 unité',
                'prix_achat' => 25.99,
                'pourcentage_marge' => 10,
                'user_id' => null,
                'derniere_date_modification' => null,
                'date_in' => date('Y-m-d H:m:s'),
                'date_out' => null
            ],
        ];

        $table = $this->table('composant');
        $table->insert($data)->save();
    }
}

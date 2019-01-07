<?php
use Migrations\AbstractSeed;

/**
 * Client seed.
 */
class ComposantModule extends AbstractSeed
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

            /* Phase 1 */
            [
                'module_id' => 1,
                'composant_id' => 1,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 1,
                'composant_id' => 2,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 1,
                'composant_id' => 3,
                'quantite' => rand(1,100),
            ],
            /* Phase 2 */
            [
                'module_id' => 2,
                'composant_id' => 1,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 2,
                'composant_id' => 2,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 2,
                'composant_id' => 3,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 2,
                'composant_id' => 4,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 2,
                'composant_id' => 5,
                'quantite' => rand(1,100),
            ],
            /* Phase 3 */
            [
                'module_id' => 3,
                'composant_id' => 1,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 3,
                'composant_id' => 2,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 3,
                'composant_id' => 3,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 3,
                'composant_id' => 4,
                'quantite' => rand(1,100),
            ],
            [
                'module_id' => 3,
                'composant_id' => 5,
                'quantite' => rand(1,100),
            ],
        ];

        $table = $this->table('composant_module');
        $table->insert($data)->save();
    }
}

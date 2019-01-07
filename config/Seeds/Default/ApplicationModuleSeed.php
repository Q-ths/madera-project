<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User seed.
 */
class ApplicationModuleSeed extends AbstractSeed
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
        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 0');

        $data = [
            [
                'nom' => 'Devis',
            ],
            [
                'nom' => 'Configuration',
            ],
            [
                'nom' => 'Carnet d\'adresses',
            ],
            [
                'nom' => 'Autres',
            ],
        ];

        $table = $this->table('application_module');
        $table->insert($data)->save();
    }
}

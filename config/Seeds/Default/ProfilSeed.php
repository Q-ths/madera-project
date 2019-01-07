<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User seed.
 */
class ProfilSeed extends AbstractSeed
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
                'nom' => 'Administrateur',
            ],
            [
                'nom' => 'Chef d\'équipe commercial ',
            ],
            [
                'nom' => 'Bureau d\'étude ',
            ],
            [
                'nom' => 'Commercial',
            ],
        ];

        $table = $this->table('profil');
        $table->insert($data)->save();
    }
}

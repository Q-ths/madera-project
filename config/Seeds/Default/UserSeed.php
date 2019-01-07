<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User seed.
 */
class UserSeed extends AbstractSeed
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
                'profil_id' => '1',
                'email' => 'admin@madera.com',
                'password' => (new DefaultPasswordHasher)->hash("admin"),
                'nom' => 'admin',
                'prenom' => 'admin',
            ],
            [
                'profil_id' => '2',
                'email' => 'chef@madera.com',
                'password' => (new DefaultPasswordHasher)->hash("chef"),
                'nom' => 'Chef d\'équipe ',
                'prenom' => 'Chef d\'équipe ',
            ],
            [
                'profil_id' => '3',
                'email' => 'etude@madera.com',
                'password' => (new DefaultPasswordHasher)->hash("etude"),
                'nom' => 'Bureau d\'étude',
                'prenom' => 'Bureau d\'étude ',
            ],
            [
                'profil_id' => '4',
                'email' => 'commercial@madera.com',
                'password' => (new DefaultPasswordHasher)->hash("commercial"),
                'nom' => 'Commercial',
                'prenom' => 'Machin',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();

        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 1');

    }
}

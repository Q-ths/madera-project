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
                'id' => null,
                'email' => 'admin@admin.local',
                'password' => (new DefaultPasswordHasher)->hash("admin"),
                'nom' => 'admin',
                'prenom' => 'admin',
                'poste' => 'Administrateur'
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();

        $this->execute('SET GLOBAL FOREIGN_KEY_CHECKS = 1');

    }
}

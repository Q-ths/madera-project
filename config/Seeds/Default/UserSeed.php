<?php
use Migrations\AbstractSeed;

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
                'password' => '$2y$10$L4Hs7CdmUbkmhl7.1smieu8p2DL6ZxmmL3OvchpUoKM/rj4R5CVXq',
                'nom' => 'admin',
                'prenom' => 'admin',
                'poste' => 'Administrateur'
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}

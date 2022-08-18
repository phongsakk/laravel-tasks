<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            $this->createUser(1, 'admin@localhost.com'),
            $this->createUser(2, 'instructor@localhost.com'),
            $this->createUser(3, 'learner@localhost.com'),
        ];
        foreach ($users as $user) User::factory()->create($user);
    }

    function createUser(int $role_id, string $email)
    {
        return [
            'role_id' => $role_id,
            'email' => $email
        ];
    }
}

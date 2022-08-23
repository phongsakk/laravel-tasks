<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PrefixSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            ContentSeeder::class
        ]);
        User::factory(10)->create();
    }
}

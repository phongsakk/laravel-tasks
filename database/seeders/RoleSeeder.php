<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            $this->createRole(1, 'แอดมิน', 'Administrator'),
            $this->createRole(2, 'ผู้สร้างเนื้อหา', 'Content Creator'),
            $this->createRole(3, 'สมาชิก', 'Member'),
        ];
        foreach ($roles as $role) Role::create($role);
    }

    function createRole(int $id, string $title_th, string $title_en)
    {
        return [
            'id' => $id,
            'title' => $title_th,
            'title_th' => $title_th,
            'title_en' => $title_en,
        ];
    }
}

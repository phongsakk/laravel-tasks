<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Seeder;

class PrefixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefixes = [
            $this->createPrefix(1, 'นาย', 'Mr.'),
            $this->createPrefix(2, 'นางสาว', 'Miss'),
            $this->createPrefix(3, 'นาง', 'Mrs.'),
            $this->createPrefix(4, 'เด็กชาย', 'Mr.'),
            $this->createPrefix(5, 'เด็กหญิง', 'Miss'),
        ];
        foreach ($prefixes as $prefix) Prefix::create($prefix);
    }

    function createPrefix(int $id, string $title_th, string $title_en)
    {
        return [
            'id' => $id,
            'title' => $title_th,
            'title_th' => $title_th,
            'title_en' => $title_en,
        ];
    }
}

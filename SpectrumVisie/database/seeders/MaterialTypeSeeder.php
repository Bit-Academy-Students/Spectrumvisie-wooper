<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTypeSeeder extends Seeder
{
    public function run()
    {
        DB::table('material_type')->insert([
            [
                'type' => 'pdf',
                'icon' => 'pdf.png',
            ],
            [
                'type' => 'word',
                'icon' => 'word.png',
            ],
            [
                'type' => 'video',
                'icon' => 'video.png',
            ],
            [
                'type' => 'youtube-link',
                'icon' => 'youtube.png',
            ],
        ]);
    }
}

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
                'icon' => 'icons/pdf.png',
            ],
            [
                'type' => 'word',
                'icon' => 'icons/word.png',
            ],
            [
                'type' => 'video',
                'icon' => 'icons/video.png',
            ],
            [
                'type' => 'youtube-link',
                'icon' => 'icons/youtube.png',
            ],
            [
                'type' => 'artikel',
                'icon' => 'icons/artikel.png'
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    $categories = [
        ['code' => '01', 'name' => 'Kennis maken met autisme'],
        ['code' => '02', 'name' => 'Kenmerken van Autisme'],
        ['code' => '03', 'name' => 'Jouw zintuigen'],
        ['code' => '04', 'name' => 'Anders voelen en begrijpen (TOM)'],
        ['code' => '05', 'name' => 'Anders doen (EF)'],
        ['code' => '06', 'name' => 'Anders naar de wereld kijken (CC)'],
        ['code' => '07', 'name' => 'Leren met autisme'],
        ['code' => '08', 'name' => 'Communicatie'],
        ['code' => '09', 'name' => 'Jouw sterke kanten'],
        ['code' => '10', 'name' => 'Emotionele ontwikkeling'],
        ['code' => '11', 'name' => 'Spanning en ontspanning'],
        ['code' => '12', 'name' => 'Autisme in de puberteit'],
        ['code' => '13', 'name' => 'Autisme bij meisjes'],
        ['code' => '14', 'name' => 'Autismepaspoort'],
        ['code' => 'A',  'name' => 'Handleiding, formulieren en werkbladen'],
        ['code' => 'B',  'name' => 'Marketingmaterialen'],
        ['code' => 'C',  'name' => 'Verdieping Autisme'],
        ['code' => 'D',  'name' => 'Vrij toegankelijke materialen'],
        ['code' => 'E',  'name' => "Werkbladen losse thema's"],
        ['code' => 'F',  'name' => "Instructievideo's Werken met de materialen"],
    ];

    foreach ($categories as $cat) {
        \App\Models\Category::create($cat);
    }
}

}

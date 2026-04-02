<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObjectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objectives = [
            ['title' => 'Mariages', 'description' => 'Soutien pour célébrer l\'amour.', 'icon' => '💍', 'color' => '#E8A0BF'],
            ['title' => 'Baptêmes', 'description' => 'Accueillir une nouvelle vie.', 'icon' => '👶', 'color' => '#60A5FA'],
            ['title' => 'Anniversaires', 'description' => 'Célébrer c\'est vivre.', 'icon' => '🎂', 'color' => '#F472B6'],
            ['title' => 'Deuils ou Funérailles', 'description' => 'Soutien dans les moments difficiles.', 'icon' => '🕊️', 'color' => '#9CA3AF'],
            ['title' => 'Aides Sociales', 'description' => 'Pour maladies et urgences.', 'icon' => '🏥', 'color' => '#34D399'],
            ['title' => 'Famine', 'description' => 'Lutte contre la faim.', 'icon' => '🌾', 'color' => '#FBBF24'],
        ];

        foreach ($objectives as $obj) {
            \App\Models\Objective::create($obj);
        }
    }
}

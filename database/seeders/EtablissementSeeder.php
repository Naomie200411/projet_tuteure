<?php

namespace Database\Seeders;

use App\Models\Etablissement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtablissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Etablissement::create([
            'name' => 'Nom de l\'établissement 1',
            'image' => 'chemin/vers/image1.jpg',
            'adresse' => 'Adresse de l\'établissement 1',
            'contact' => 'Contact de l\'établissement 1',
            'name_proprio' => 'Propriétaire de l\'établissement 1',
            'validate_status' => 'Valide',
            'note_moy' => 4.5,
            'user_id' => 1,
        ]);

        Etablissement::create([
            'name' => 'Nom de l\'établissement 2',
            'image' => 'chemin/vers/image2.jpg',
            'adresse' => 'Adresse de l\'établissement 2',
            'contact' => 'Contact de l\'établissement 2',
            'name_proprio' => 'Propriétaire de l\'établissement 2',
            'validate_status' => 'En attente',
            'note_moy' => 3.8,
            'user_id' => 2,
        ]);
    }
}

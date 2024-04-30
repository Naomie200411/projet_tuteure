<?php

namespace Database\Seeders;

use App\Models\Recommandation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommandationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recommandation::create([
            'date_recommandation' => Carbon::now()->subDays(7), // Date de recommandation fictive
            'etablissement_id' => 1, // ID de l'établissement associé à la recommandation
        ]);

        Recommandation::create([
            'date_recommandation' => Carbon::now()->subDays(14), // Date de recommandation fictive
            'etablissement_id' => 2, // ID de l'établissement associé à la recommandation
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Interaction;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interaction::create([
            'date_visite' => Carbon::now()->subDays(5), // Date de visite fictive
            'etablissement_id' => 1, // ID de l'établissement associé à l'interaction
            'user_id' => 1, // ID de l'utilisateur associé à l'interaction
        ]);

        Interaction::create([
            'date_visite' => Carbon::now()->subDays(10), // Date de visite fictive
            'etablissement_id' => 2, // ID de l'établissement associé à l'interaction
            'user_id' => 2, // ID de l'utilisateur associé à l'interaction
        ]);
    }
}

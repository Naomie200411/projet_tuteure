<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Promotion::create([
            'date_debut' => Carbon::parse('2024-05-01'),
            'date_fin' => Carbon::parse('2024-05-15'),
            'details_promo' => 'Détails de la première promotion',
            'etablissement_id' => 1,
        ]);
    }
}

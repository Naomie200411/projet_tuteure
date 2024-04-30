<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluation::create([
            'note' => 4.5, // Note fictive
            'commentaire' => 'C\'était une expérience formidable!',
            'date_evaluation' => Carbon::now()->subDays(10), // Date de l'évaluation fictive
            'user_id' => 4, // ID de l'utilisateur associé à l'évaluation
            'etablissement_id' => 1, // ID de l'établissement associé à l'évaluation
        ]);

        Evaluation::create([
            'note' => 3.8, // Note fictive
            'commentaire' => 'Je m\'attendais à mieux.',
            'date_evaluation' => Carbon::now()->subDays(5), // Date de l'évaluation fictive
            'user_id' => 3, // ID de l'utilisateur associé à l'évaluation
            'etablissement_id' => 2, // ID de l'établissement associé à l'évaluation
        ]);
    }
}

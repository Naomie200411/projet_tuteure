<?php

namespace Database\Seeders;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create([
            'message' => 'Message de notification 1',
            'date_envoi' => Carbon::parse('2024-05-01'),
            'statut_lecture' => Carbon::parse('2024-05-01'), // Date de lecture de la notification
            'promotion_id' => 1, // ID de la promotion associée à la notification
            'user_id' => 1, // ID de l'utilisateur associé à la notification
        ]);
    }
}

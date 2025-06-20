<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    public function run()
    {
        Participant::create([
            'peserta' => '7dd9cdc1-6183-4178-a6fc-b744f6c4c0bf',
            'status' => 'TERIMA',
        ]);
    }
}
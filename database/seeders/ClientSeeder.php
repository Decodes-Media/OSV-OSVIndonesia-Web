<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'name' => '305',
            'logo_path' => 'static/305.png',
            'order' => 1,
        ]);

        Client::create([
            'name' => 'ANGSANA VELAVARU',
            'logo_path' => 'static/Angsana.png',
            'order' => 2,
        ]);

        Client::create([
            'name' => 'OBLU NATURE Helengeli',
            'logo_path' => 'static/OBLU-NATURE-Helengeli.jpg',
            'order' => 3,
        ]);

        Client::create([
            'name' => 'SOFITEL FIJI RESORT & SPA',
            'logo_path' => 'static/sofitel-fiji-logo.png',
            'order' => 4,
        ]);

        Client::create([
            'name' => 'Radisson BLU',
            'logo_path' => 'static/Radisson_Blu_logo.svg.png',
            'order' => 5,
        ]);

        Client::create([
            'name' => 'EMBUDU VILLAGE',
            'logo_path' => 'static/Embudu.png',
            'order' => 6,
        ]);

        Client::create([
            'name' => 'BAROS MALDIVES',
            'logo_path' => 'static/Baros.png',
            'order' => 7,
        ]);

        Client::create([
            'name' => 'HUVAFEN FUSHI MALDIVES',
            'logo_path' => 'static/Huvafen_Fushi.png',
            'order' => 8,
        ]);

        Client::create([
            'name' => 'VELAA',
            'logo_path' => 'static/Velaa.png',
            'order' => 9,
        ]);

        Client::create([
            'name' => 'WALDORF ASTORIA SEYCHELLES PLATTE ISLAND',
            'logo_path' => 'static/Waldorf Astoria Seychelles.png',
            'order' => 10,
        ]);

        Client::create([
            'name' => 'NIYAMA PRIVATE ISLANDS MALDIVES',
            'logo_path' => 'static/Niyama logo.webp',
            'order' => 11,
        ]);

        Client::create([
            'name' => 'ROVE HOTELS',
            'logo_path' => 'static/Rove Al Marjan Island Hotel.png',
            'order' => 12,
        ]);

        Client::create([
            'name' => 'Ula',
            'logo_path' => 'static/ULA Logo.png',
            'order' => 13,
        ]);
    }
}

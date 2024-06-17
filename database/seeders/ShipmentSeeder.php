<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shipment::create([
            'Type' => 'Regular',
            'Price' => 100,
            'Estimation' => 3
        ]);

        Shipment::create([
            'Type' => 'Instant',
            'Price' => 300,
            'Estimation' => 1
        ]);
    }
}

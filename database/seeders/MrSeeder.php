<?php

namespace Database\Seeders;

use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Maintenance::create([
            'name' => 'Damage Aircon',
            'address' => 'Duma',
            'phone' => '32234452343',
            'description' => ' Needed Cleaning and check up'
        ]);
    }
}

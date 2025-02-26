<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::truncate();

        Feature::create(['feature' => 'Washer/Dryer - In Unit', 'icon' => 'washer.png']);
        Feature::create(['feature' => 'Dishwasher', 'icon' => 'dishwasher.png']);
        Feature::create(['feature' => 'Hardwood Floors', 'icon' => 'woodfloor.png']);
        Feature::create(['feature' => 'Granite Countertops', 'icon' => 'granit.png']);
        Feature::create(['feature' => 'Heating', 'icon' => '']);
        Feature::create(['feature' => 'Eat-in Kitchen', 'icon' => '']);
        Feature::create(['feature' => 'Kitchen', 'icon' => '']);
        Feature::create(['feature' => 'Microwave', 'icon' => '']);
        Feature::create(['feature' => 'Hardwood Floors', 'icon' => '']);
    }
}

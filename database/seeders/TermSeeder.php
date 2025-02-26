<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::truncate();

        Term::create(['term' => 'No Pets']);
        Term::create(['term' => 'No Smoking']);
        Term::create(['term' => 'No Parking']);
        Term::create(['term' => '12 Month LEA']);
        Term::create(['term' => 'Shared Outdoor Duties']);
    }
}

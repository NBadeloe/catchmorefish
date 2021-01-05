<?php

use App\Locatie;
use Illuminate\Database\Seeder;

class LocatieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locatie =  Locatie::create([
            'locatie' => 'Amsterdam',

        ]);
        $locatie =  Locatie::create([
            'locatie' => 'Rotterdam',

        ]);
        $locatie =  Locatie::create([
            'locatie' => 'Zoetermeer',

        ]);
    }
}

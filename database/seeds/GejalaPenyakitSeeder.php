<?php

use Illuminate\Database\Seeder;
use App\Penyakit;

class GejalaPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$trips = [
    		1 => ['bobot' => 0.7], 
    		2 => ['bobot' => 0.8], 
    		5 => ['bobot' => 0.6], 
    		6 => ['bobot' => 0.7]
    	];
    	Penyakit::findOrFail(1)->gejalas()->attach($trips);

        $lalatBuah = [
        	7 => ['bobot' => 0.4], 
    		8 => ['bobot' => 0.6], 
    		9 => ['bobot' => 0.8], 
    		10 => ['bobot' => 0.9]
        ];
        Penyakit::findOrFail(2)->gejalas()->attach($lalatBuah);

        $ulatDaun = [
    		11 => ['bobot' => 0.7], 
    		12 => ['bobot' => 0.8]
        ];
        Penyakit::findOrFail(3)->gejalas()->attach($ulatDaun);

        $kutuKebul = [
    		1 => ['bobot' => 0.8], 
			2 => ['bobot' => 0.8], 
			3 => ['bobot' => 0.4], 
			13 => ['bobot' => 0.6]
        ];
        Penyakit::findOrFail(4)->gejalas()->attach($kutuKebul);

        $virusKeriting = [
        	1 => ['bobot' => 0.9], 
			2 => ['bobot' => 0.6], 
			4 => ['bobot' => 0.8], 
			14 => ['bobot' => 0.7], 
			15 => ['bobot' => 0.8]
        ];
        Penyakit::findOrFail(5)->gejalas()->attach($virusKeriting);

        $virusKuning = [
        	3 => ['bobot' => 0.6], 
			4 => ['bobot' => 0.8], 
			16 => ['bobot' => 0.6], 
			17 => ['bobot' => 0.8], 
			18 => ['bobot' => 0.8]
        ];
        Penyakit::findOrFail(6)->gejalas()->attach($virusKuning);
    }
}

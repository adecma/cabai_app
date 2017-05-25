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
    	$data1 = [
    		40 => ['bobot' => 0.8],
            26 => ['bobot' => 0.8],
    	];
    	Penyakit::findOrFail(1)->gejalas()->attach($data1);

        $data2 = [
        	44 => ['bobot' => 0.4],
            27 => ['bobot' => 0.3],
            11 => ['bobot' => 0.2],
            8 => ['bobot' => 0.3],
            24 => ['bobot' => 0.7],
            7 => ['bobot' => 0.4],
            37 => ['bobot' => 0.3],
            22 => ['bobot' => 0.6],
            33 => ['bobot' => 0.5],
        ];
        Penyakit::findOrFail(2)->gejalas()->attach($data2);

        $data3 = [
    		3 => ['bobot' => 0.5],
            13 => ['bobot' => 0.7],
            27 => ['bobot' => 0.3],
            19 => ['bobot' => 0.3],
            35 => ['bobot' => 0.2],
        ];
        Penyakit::findOrFail(3)->gejalas()->attach($data3);

        $data4 = [
    		27 => ['bobot' => 0.4],
            42 => ['bobot' => 0.3],
            32 => ['bobot' => 0.3],
            33 => ['bobot' => 0.6],
            31 => ['bobot' => 0.7],
            24 => ['bobot' => 0.7],
        ];
        Penyakit::findOrFail(4)->gejalas()->attach($data4);

        $data5 = [
        	44 => ['bobot' => 0.4],
            27 => ['bobot' => 0.4],
            11 => ['bobot' => 0.2],
            8 => ['bobot' => 0.3],
            7 => ['bobot' => 0.4],
            34 => ['bobot' => 0.6],
            5 => ['bobot' => 0.6],
            14 => ['bobot' => 0.8],
        ];
        Penyakit::findOrFail(5)->gejalas()->attach($data5);

        $data6 = [
        	43 => ['bobot' => 0.4],
            27 => ['bobot' => 0.4],
            17 => ['bobot' => 0.3],
            33 => ['bobot' => 0.3],
            10 => ['bobot' => 0.2],
            30 => ['bobot' => 0.6],
            38 => ['bobot' => 0.4],
            20 => ['bobot' => 0.5],
            29 => ['bobot' => 0.7],
            9 => ['bobot' => 0.6],
        ];
        Penyakit::findOrFail(6)->gejalas()->attach($data6);

        $data7 = [
            20 => ['bobot' => 0.4],
            21 => ['bobot' => 0.5],
            12 => ['bobot' => 0.7],
            6 => ['bobot' => 0.6],
            1 => ['bobot' => 0.8],
        ];
        Penyakit::findOrFail(7)->gejalas()->attach($data7);

        $data8 = [
            25 => ['bobot' => 0.6],
            41 => ['bobot' => 0.7],
            28 => ['bobot' => 0.8],
            36 => ['bobot' => 0.8],
            2 => ['bobot' => 0.5],
            39 => ['bobot' => 0.4],
            4 => ['bobot' => 0.4],
        ];
        Penyakit::findOrFail(8)->gejalas()->attach($data8);

        $data9 = [
            27 => ['bobot' => 0.3],
            23 => ['bobot' => 0.4],
            15 => ['bobot' => 0.8],
            16 => ['bobot' => 0.7],
            18 => ['bobot' => 0.7],
        ];
        Penyakit::findOrFail(9)->gejalas()->attach($data9);
    }
}

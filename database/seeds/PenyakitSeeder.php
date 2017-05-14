<?php

use Illuminate\Database\Seeder;
use App\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
        	['name' => 'Trips (Thrips Parvispinus)', 'probabilitas' => 0.70714],
			['name' => 'Lalat Buah (Bactrocera sp)', 'probabilitas' => 0.72963],
			['name' => 'Ulat Daun/Ulat Gerayak (Spodoptera litura)', 'probabilitas' => 0.75333],
			['name' => 'Kutu Kebul', 'probabilitas' => 0.69231],
			['name' => 'Virus Keriting', 'probabilitas' => 0.77369],
			['name' => 'Virus Kuning (Gemini Virus)', 'probabilitas' => 0.73333]
        ];

        foreach ($sample as $s) {
        	$p = new Penyakit;
        	$p->name = $s['name'];
        	$p->probabilitas = $s['probabilitas'];
        	$p->save();
        }
    }
}

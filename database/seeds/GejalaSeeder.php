<?php

use Illuminate\Database\Seeder;
use App\Gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
        	['name' => 'Daun keriting'],
			['name' => 'Tanaman menjadi kerdil'],
			['name' => 'Daun menguning'],
			['name' => 'Anak tulang daun menguning'],
			['name' => 'Adanya bercak keperak-perakan pada bagian bawah daun'],
			['name' => 'Adanya bercak-bercak kuning hingga kecoklatan'],
			['name' => 'Adanya titik hitam pada pangkal buah'],
			['name' => 'Buah seperti tersiram air panas'],
			['name' => 'Buah cabai busuk'],
			['name' => 'Buah cabai berjatuhan'],
			['name' => 'Daun menjadi berlubang dan merenggas'],
			['name' => 'Daun tanaman cabai hanya tinggal efidermisnya'],
			['name' => 'Daun menggulung'],
			['name' => 'Warna daun belang-belang hijau tua dan hijua muda'],
			['name' => 'Ukuran daun lebih kecil'],
			['name' => 'Terdapat bercak kuning pada pucuk'],
			['name' => 'Daun cekung dan mengkerut'],
			['name' => 'Batang tanaman berwarna kuning']
        ];

        foreach ($sample as $s) {
        	$g = new Gejala;
        	$g->name = $s['name'];
        	$g->save();
        }
    }
}

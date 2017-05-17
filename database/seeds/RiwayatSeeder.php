<?php

use Illuminate\Database\Seeder;
use App\Riwayat;

class RiwayatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample = [
        	[
        		'nama' => 'Joni Joe',
        		'alamat' => 'Jl.Samudra Utara No.34',
        		'pekerjaan' => 'Driver Go-Jek',
        	],
        	[
        		'nama' => 'Elbaf Indra',
        		'alamat' => 'Jl.Ono Papu No.74',
        		'pekerjaan' => 'Mahasiswa',
        	],
        	[
        		'nama' => 'Santi Diego',
        		'alamat' => 'Jl.Aceh Utara No.54',
        		'pekerjaan' => 'Karyawan',
        	],
        	[
        		'nama' => 'Kamunjani',
        		'alamat' => 'Jl.Deidera Timur No.14',
        		'pekerjaan' => 'Mahasiswi',
        	],
        	[
        		'nama' => 'Papah Nugi',
        		'alamat' => 'Jl.Indon Sari No.24',
        		'pekerjaan' => 'Guru',
        	],
        ];

        foreach ($sample as $data) {
        	$r = new Riwayat;
        	$r->nama = $data['nama'];
        	$r->alamat = $data['alamat'];
        	$r->pekerjaan = $data['pekerjaan'];
        	$r->save();
        }
    }
}

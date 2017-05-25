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
        	['name' => 'Apabila menginfeksi insang, kerusakan dimulai dari ujung filamen insang dan merambat ke bagian pangkal, akhirnya filamen membusuk dan rontok'],
			['name' => 'Bengkak-bengkak di bagian tubuh (kanan/kiri)'],
			['name' => 'Berenang ke permukaan air dan tubuhnya berwarna buram/kotor'],
			['name' => 'Berenang tidak normal, berdiam di dasar dan akhirnya mati'],
			['name' => 'Berkumpul/mendekat ke air masuk'],
			['name' => 'Di sekeliling luka tertutup oleh pigmen berwarna kuning cerah'],
			['name' => 'Frekuesi pernafasan meningkat dan sering meloncat-loncat'],
			['name' => 'Gelisah dan lamban'],
			['name' => 'Ikan mati lemas sering ditemukan di permukaan maupun dasar kolam'],
			['name' => 'Ikan mengumpul dekat saluran pembuangan'],
			['name' => 'Ikan tampak kurus'],
			['name' => 'Infeksi di sekitar mulut terlihat di selaputi benang'],
			['name' => 'Insang berwarna kemerahan atau kecoklatan'],
			['name' => 'Insang pucat atau membengkak sehingga operkulum terbuka'],
			['name' => 'Insang pucat, terdapat bercak putih dan akhirnya rusak dan membusuk'],
			['name' => 'Kematian masal bisa terjadi dalam waktu 24-48 jam'],
			['name' => 'Kulit kasat'],
			['name' => 'kulit melepuh'],
			['name' => 'Lemah, kesulitan bernafas'],
			['name' => 'Luka disekitar mulut dan bagian tubuh lainnya'],
			['name' => 'Lukaa berwarna putih kecoklatan kemudian berkembang menjadi borok'],
			['name' => 'Mengakibatkan iritasi dan  luka pada kulit ikan karena struktur alat penempel yang keras (chitin)'],
			['name' => 'Mengap-mengap, lemah dan ekses mukus'],
			['name' => 'Menggosok-gosokkan badan pada benda di sekitarnya'],
			['name' => 'Menginfeksi jaringan ikat tapis insang, tulang kartilag, otot/daging dan beberapa organ dalam ikan (terutama benih)'],
			['name' => 'Miselia (kumpulan hifa) berwarna putih'],
			['name' => 'Nafsu makan menurun'],
			['name' => 'Pada infeksi berat tutup insang (Operkulum) tidak dapat menutup sempurna'],
			['name' => 'Pada infeksi berat, perut lembek dan bengkak (dropsy) yang berisi cairan merah kekuningan'],
			['name' => 'Pendarahan pada pangkal sirip, ekor, sekitar anus dan bagian tubuh lainnya'],
			['name' => 'Peradangan pada kulit disertai warna kemerahan pada lokasi penempelan cacing'],
			['name' => 'Pertumbuhan lamban'],
			['name' => 'Produksi lendir berlebih'],
			['name' => 'Produksi mukus pada insang berlebih'],
			['name' => 'Proses gantu kulit (moulting) terhambat, dan timbul peradangan ada kulit'],
			['name' => 'Sirip ekor bengkok dan berwarna gelap'],
			['name' => 'Sirip rusak atau rontok'],
			['name' => 'Sisik lepas'],
			['name' => 'Struktur tulang yang tidak normal'],
			['name' => 'Terlihat adanya benang-benang halus menyerupai kapas yang menempel pada telur atau luka pada bagian eksternal ikan'],
			['name' => 'Terlihat benjolan putih seperti tumor berbentuk bulat-lonjong menyerupai butiran padi pada insang ikan'],
			['name' => 'Tubuh berwarna gelap'],
			['name' => 'Warna tubuh kusam/gelap'],
			['name' => 'Warna tubuh pucat'],
        ];

        foreach ($sample as $s) {
        	$g = new Gejala;
        	$g->name = $s['name'];
        	$g->save();
        }
    }
}

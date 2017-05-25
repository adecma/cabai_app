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
            ['name' => 'Seprolegniasis (Saprolegnia sp.)', 'probabilitas' => 0.8, 'keterangan' => 'Saprolegnia sp. termasuk jenis jamur yang sangat berbahaya bila lingkungan air sangat tercemar oleh bahan organik.Ciri-ciri jamur ini adalah memiliki hifa yang panjang dan tidak bersepta, hidup pada ekosistem air tawar namun ada yang mamp hidup pada salinitas 3 promil. Tumbuh optimum pada suhu air 1-26 oC. Reproduksi secara aseksual, melalui hifa fertil untuk memproduksi spora infektif. Menginfeksi semua jenis ikan air tawar. Pemicu patogenisitas cendawan ini antara lain: adanya luka, malnustrisi, suhu dan oksigen rendah, bahan organic yang tinggi, kualitas telur buruk/infertil dan atau kepadatan ikan/telur tinggi. Serangan bersifat kronis hingga akut, dapat mengakibatkan kematian hingga 100%.', 'pengendalian' => 'Menaikkan dan mempertahankan suhu air > 28 oC dan/atau penggantian air baru yang lebih sering. Pengobatan dapat dilakukan dengan cara perendaman dengan kalium permanganate (PK) pada dosis 1 gram/100 liter air selama 90 menit, formalin pada dosis 100-200 ppm selama 1-3 jam, garam dapur pada konsentrasi 1-10 promil (tergantung spesies dan ukuran) selama 10-60 menit, methylene blue pada dosis 3-5 ppm selama 24 jam. '],
            ['name' => 'Gatal / Tricodiniasis (Trichodina spp.)', 'probabilitas' => 0.467568, 'keterangan' => 'Trishodina sp. merupakan parasite yang menyerang bagian luar ikan yaitu pada bagian kulit dan bagian insang ikan. Protozoa dari golongan ciliata, berbentuk bundar, simetris dan terdapat di ekosistem air tawar, payau dan laut. Memiliki cincin dentikel berupa cakram yang berfungsi sebagai alat penempel. Inang parasit adalah semua benih ikan air tawar, payau dan laut. Kelompok parasit ini umumnya lebih bersifat komensalis daripada parasitik sejati, karena hanya memakan sel-sel kulit ikan yang mati/hancur.', 'pengendalian' => 'Pemberian pakan yg dicampur oxytetracycline 25-30 mg/kg ikan atau sulafamerazine 200mg/kg ikan selama 7 hari berturut-turut.'],
            ['name' => 'Dekil / Fouling Disease (Epistylis sp.)', 'probabilitas' => 0.48, 'keterangan' => 'Fouling disease umumnya disebabkan oleh mikroorganisme dari kelompok Protozoa, meskipun sering pula berasoisasi denga algae seperti Nitzschia spp., Amphiprora spp., Navicula spp., Enteromorpha spp., dll. Factor pemicu terjadinya ledakan penyakit antara lain, kepadatan tinggi, malnutrisi, kadar bahan organic yang tinggi, dan fluktuasi parameter kualitas air terutama suhu.', 'pengendalian' => 'Desinfeksi wadah/petak pemeliharaan dan sumber air yang bebas mikroorganisme penempel. Memperbaiki kualitas air secara keseluruhan, terutama mengurangi kadar bahan organik terlarut dan/atau meningkatkan frekuensi penggantu air baru. Pemberian unsur immunostimulan (misalnya penambahan Vitamin C pada pakan) secara rutin selama pemeliharaan. Merangsang proses ganti kulit melalui memanipulasi parameter kualitas air yang merupakan faktor determinan. Perendaman dalam larutan formalun pada dosis 25-50 ppm selama 24 jam atau lebih.'],
            ['name' => 'Cacing Kulit / Gyrodactyliasis (Gyrodactylus sp.)', 'probabilitas' => 0.56, 'keterangan' => 'Gyrodactylus sp. juga termasuk kedalam golongan cacing-cacingan. Cacing kecil yang bersifat ekto-parasit, bersifat obligat parasitic (ikan sebagai satu-satunya inang definitive), dan berkembang biak dengan beranak. Gyrodactylus sp. Tidak memiliki titik mata dan pada ujung kepalanya terdapat 2 buah tonjolan. Selama hidupnya harus menginfeksi ikan sebagai inang definitif, infeksi berat dapat mematikan 30-100% dalam tempo beberapa minggu terutama sebagai akibat infeksi sekunder oleh bakteri dan cendawan.', 'pengendalian' => 'Mempertahankan kualitas air terutama stabilisasi suhu air 29o C. Mengurangi kadar bahan organik terlarut dan/atau meningkatkan frekuensi pergantian air. Ikan yang terserang Gyrodactyliasis dengan tingkat prevalensi dan instensitas yang rendah, pengobatan dapat dilakukan dengan perendaman beberapa jenis desinfektan, antara lain larutan garam dapur pada konsentrasi 500-10.000 ppm (tergantung jenis dan umur ikan) selama 24 jam, larutan kalium permanganate (PK) pada dosis 4 ppm selama 12 jam, larutan formalin pada dosis 25-50 ppm selama 24jam atau lebih.'],
            ['name' => 'Cacing Insang / Dactylogyriasis (Dactylogyrus sp.)', 'probabilitas' => 0.532432, 'keterangan' => 'Dactylogyrus sp. adalah penyakit ikan yang disebabkan oleh infeksi cacing pada insang. Cacing kecil yang bersifat ekto-parasit, bersifat obligat parasitic (ikan sebagai satu-satunya inang definitive) dan berkembang biak dengan bertelur. Dactylogyrus sp. memiliki 2 pasang mata, dan pada ujung kepalanya terdapat 4 buah tonjolan. Selama hidupnya harus menginfeksi ikan sebagai inang definitif, sangat ganas, infeksi berat dapat mematikan 30-100% dalam tempo beberapa minggu.', 'pengendalian' => 'Mempertahankan kualitas air terutama stabilisasi suhu air > 29o C. Mengurangi kadar bahan organik terlarut dan/atau meningkatkan frekuensi pergantian air. Ikan yang terserang Dactylogyriasis dengan tingkat prevalensi dan instensitas yang rendah, pengobatan dapat dilakukan dengan perendaman beberapa jenis desinfektan, antara lain larutan garam dapur pada konsentrasi 500-10.000 ppm (tergantung jenis dan umur ikan) selama 24 jam, larutan kalium permanganate (PK) pada dosis 4 ppm selama 12 jam, larutan formalin pada dosis 25-50 ppm selama 24 jam atau lebih, glacial acetic acid 0,5 ml/L selama 30 detik setiap 2 hari selama 3-4 kali.'],
            ['name' => 'Merah / Motile Aeromonas Septicemis (Aeromonas Hydrophila)', 'probabilitas' => 0.490909, 'keterangan' => 'Penyakit merah merupakan penyakit bakterial yang sering terjadi  pada semua umur dan jenis ikan air tawar, meskipun jenis bakteri tersebut sering ditemukan pula pada ikan air payau dan laut. Infeksi bakteri ini biasanya berkaitan dengan kondisi stress akibat kepadatan tinggi, malnutrisi, penanganan yang kurang baik, infeksi parasit, bahan organik tinggi, oksigen rendah, kualitas air yang buruk, fluktuasi suhu air yang ekstrim, dll.', 'pengendalian' => 'Pencegahan secara dini (benih) melalui vaksinasi anti- Aeromonas hydrophila(HydroVac). Desinfeksi sarana budidaya sebelum dan selama proses pemeliharaan ikan. Pemberian unsur immunostimulan (misalnya penambahan vitamin C pada pakan) secara rutin selama pemeliharaan. Menghindari terjadinya stress (fisik, kimia, biologi). Memperbaiki kualitas air secara keseluruhan, terutama mengurangi kadar bahan organik terlarut dan/atau meningkatkan frekuensi penggantian air baru. Pengelolaan kesehatan ikan secara terpadu (ikan, lingkungan dan pathogen). Oxolinic acid pada dosis 10 mg/kg bobot tubuh ikan/hari selama 10 hari.'],
            ['name' => 'Columnaris Disease (Flexibacter)', 'probabilitas' => 0.633333, 'keterangan' => 'Bakteri gram negatif, berbentuk batang kecil, bergerak meluncur, dan terdapat di ekosistem air tawar. Sifat bakteri ini adalah berkelompok membentuk kumpulan seperti column. Infeksi bakteri ini umumnya berkaitan dengan kondisi stress akibat fluktuasi suhu air yang ekstrim dan kualitas air yang buruk. Sifat serangan umumnya sub acut – acut, apabila insang yang dominan sebagai target organ, ikan akan mati lemas dan kematian yang ditimbulkannya bisa mencapai 100%.', 'pengendalian' => 'Menghindari terjadinya stress (fisik, kimia, biologi). Mengurangi kadar bahan organik terlarut dan/atau meningkatkan frekuensi penggantian air baru. Melalui perendaman dengan beberapa bahan kimia seperti garam dapur 0,5% atau kalium permanganat 5 ppm selama 1 hari, Acriflavine 5-10 ppm melalui perendaman selama beberapa hari, Chioramin B atau T 18-20 ppm melalui perendaman selama 2-3 hari, Bernzalkonium chloride pada dosis 18-20 ppm selama 2-3 hari, Oxolinic acid pada dosis 1 ppm selama 24 jam.'],
            ['name' => 'Gembil / Myxosporidiasis (Henneguya spp.)', 'probabilitas' => 0.642857, 'keterangan' => 'Myxosporea berbentuk seperti buah pir atau biji semangka (kwaci), terbungkus dalam kista yang berisi ribuan spora. Di dalam spora Myxobolus dan Myxosoma tedapat 1-4 polar kapsul dan sporplasma. Pada saat spora belum matang, 2 inti sporoplasma melebur menjadi satu sebelum atau setelah sporoplasma terlepas. Organ yang baru terbentuk ini mmiliki vakuola yang disbebut vakuola iodinophilous. Infeksi myxosporea  terjadi pada saat spora bebas dimakan oleh inang dan masuk ke dalam usus. Di dalam usus, spora tersebut pecah mengeluarkan sporoplasma, dan selanjutnya bergerak secara amoeboid masuk dalam sirkulasi darah dan terbawa ke organ target infeksi. Pravelensi serangan bervariasi dari rendah sampai sedang dengan mortalitas berpola kronis.', 'pengendalian' => 'Persiapan kolam (pengeringan dan desinfeksi kolam) untuk memutus siklus hidup arasite. Ikan yang terinfeksi seger diambil dan dimusnakhan. Hindari penggunaan air dari kolam yang terinfeksi parasite. Pengendapan yang dilengkapi dengan filtrasi fisik (batu,ijuk,kerikil,dan pasir).'],
            ['name' => 'KHV (Koi Harpes virus)', 'probabilitas' => 0.644828, 'keterangan' => 'Virus DNA, penyebab utama kematian masal pada ikan mas dan koi. Hanya menginfeksi ikan mas dan koi. Jenis ikan lain tidak terinfeksi, termasuk dari family cyprinidae. Tidak menular pada manusia yang mengkonsumsi atau kontak dengan ikan yang terinfeksi (tidak zoonosis). Sangat virulen, masa inkubasi 1 – 7 hari dengan kematian mencapai 100%. Penularan melalui kontak antar ikan, air/lumpur dan peralatan media lain seperti sarana trasnportasi, manusia, dll. Ikan yang bertahan hidup (survivors) dapat berlaku sebagai pembawa (carriers) atau menjadi kebal, namun tetap berpotensi sebagai carriers. Kekebalan terhadap KHV tidak ditransfer ke keturunannya', 'pengendalian' => 'Desinfeksi sebelum/selama proses produksi. Manajemen kesehatan ikan yang terintegrasi. Penggunaan ikan bebas KHV & karantina (biosecurity). Vaksinasi anti-KHV dan/atau pemberian imunostimulan (Vitamin C, ragi, dll) selama masa pemeliharaan. Mengurangi padat tebar dan hindari stress.'],
        ];

        foreach ($sample as $s) {
        	$p = new Penyakit;
        	$p->name = $s['name'];
            $p->probabilitas = $s['probabilitas'];
            $p->keterangan = $s['keterangan'];
        	$p->pengendalian = $s['pengendalian'];
        	$p->save();
        }
    }
}

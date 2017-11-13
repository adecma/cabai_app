<?php

use Illuminate\Database\Seeder;
use App\Penyakit;

class PenyakitImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = ['1-saprolegnia-sp.jpg', '2-trichodina-sp.jpg', '3-epistylis-sp..jpg', '4-gyrodactylus-sp.jpg', '5-dactylogyrus-sp..jpg', '6-aeromonas-hdrophilla.jpg', '7-flexibacter.png', '8-henneguya-sp.jpg', '9-khv.jpg'];

        $count = Penyakit::count();

        for ($i=1; $i <= $count ; $i++) {
            $p = Penyakit::find($i);
            $p->img = $datas[$i-1];
            $p->save();
        }
    }
}

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
        	[
                'name' => 'Trips (Thrips Parvispinus)', 
                'probabilitas' => 0.70714,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
			[
                'name' => 'Lalat Buah (Bactrocera sp)', 
                'probabilitas' => 0.72963,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
			[
                'name' => 'Ulat Daun/Ulat Gerayak (Spodoptera litura)', 
                'probabilitas' => 0.75333,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
			[
                'name' => 'Kutu Kebul', 
                'probabilitas' => 0.69231,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
			[
                'name' => 'Virus Keriting', 
                'probabilitas' => 0.77369,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
			[
                'name' => 'Virus Kuning (Gemini Virus)', 
                'probabilitas' => 0.73333,
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.',
                'pengendalian' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatem laboriosam cum modi vero, ipsam adipisci architecto est? Nulla totam, maiores laudantium quas natus illo animi facere libero at iusto.'
            ],
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

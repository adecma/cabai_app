<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Penyakit;
use DB;

class KonsultasiController extends Controller
{
    public function index(Request $request)
    {
    	if(! $request->all()){
    		return view('konsultasi.index');
    	}

    	$this->validate($request, [
    			'nama' => 'required',
    			'alamat' => 'required',
    			'pekerjaan' => 'required'
    		]);

    	session()->flashInput($request->all());

    	return redirect()->route('konsultasi.gejala');
    }

    public function gejala()
    {
    	if (! session('_old_input')) {
    		session()->flash('danger', 'alert-danger');
    		session()->flash('notifikasi', 'Maaf, silakan masukan detail identitas Anda kembali');

    		return redirect()->route('konsultasi.index');
    	}
    	$gejalas = Gejala::orderBy('name', 'asc')->get();

    	return view('konsultasi.gejala', compact('gejalas'));
    }

    public function proses(Request $request)
    {
    	$this->validate($request, [
    			'nama' => 'required',
    			'alamat' => 'required',
    			'pekerjaan' => 'required',
    			'gejala' => 'required|min:2'
    		]);
        
    	$penyakits = Penyakit::orderBy('id', 'asc')->get();

        $dataStep1 = $this->prosesStep1($penyakits, $request);

        $final = $this->prosesStep2($dataStep1, $request);

        $hasil = collect($final)
                        ->sortByDesc(function($value, $key) {
                            return $value['persen'];
                        })
                        ->values()
                        ->first();

        $count = [
                    'penyakit' => $penyakits->count(), 
                    'gejala' => count($request->input('gejala'))
                ];

    	return view('konsultasi.showResult', compact('final', 'count', 'hasil'));
    }

    private function prosesStep1($penyakits, Request $request)
    {
        $no = 0;
        foreach ($penyakits as $penyakit) {
            $dataStep1[] = [
                                'penyakit_id' => $penyakit->id, 
                                'penyakit_nama' => $penyakit->name, 
                                'penyakit_probabilitas' => $penyakit->probabilitas, 
                                'gejala' => null,
                                'sum' => null,
                                'persen' => null
                            ];

            $selectedGejala = collect($request->input('gejala'))
                                    ->sort()
                                    ->values()
                                    ->all();

            foreach ($selectedGejala as $gejala) {
                $hubungan = DB::table('gejala_penyakit')
                                ->select('gejala_penyakit.*')
                                ->where('penyakit_id', $penyakit->id)
                                ->where('gejala_id', $gejala)
                                ->first();
                $dataGejala = DB::table('gejalas')
                                ->select('gejalas.*')
                                ->where('id', $gejala)
                                ->first();

                if ($hubungan) {
                    $bobot = $hubungan->bobot;
                } else {
                    $bobot = 0;
                }

                $dataStep1[$no]['gejala'][] = [
                                                'gejala_id' => $gejala, 
                                                'gejala_nama' => $dataGejala->name, 
                                                'bobot' => $bobot,
                                                'atas' => null,
                                                'bawah' => null,
                                                'dibagi' => null
                                                ];
            }

            $no++;
        }

        return $dataStep1;
    }

    private function prosesStep2($dataStep1, Request $request)
    {
        for ($i=0; $i < count($dataStep1); $i++) { 
            $selectedGejala = collect($request->input('gejala'))
                                    ->sort()
                                    ->values()
                                    ->all();

            for ($j=0; $j < count($selectedGejala); $j++) { 
                $dataStep1[$i]['gejala'][$j]['atas'] = $dataStep1[$i]['gejala'][$j]['bobot'] * $dataStep1[$i]['penyakit_probabilitas'];

                for ($k=0; $k < count($dataStep1); $k++) { 
                    $bawah[] = $dataStep1[$k]['gejala'][$j]['bobot'] * $dataStep1[$k]['penyakit_probabilitas'];
                }

                $dataStep1[$i]['gejala'][$j]['bawah'] = array_sum($bawah);
                unset($bawah);  

                $dibagi = $dataStep1[$i]['gejala'][$j]['atas'] / $dataStep1[$i]['gejala'][$j]['bawah'];
                $dataStep1[$i]['gejala'][$j]['dibagi'] = round($dibagi, 6);
                $arrDibagi[] = $dataStep1[$i]['gejala'][$j]['dibagi'];
            }

            $dataStep1[$i]['sum'] = array_sum($arrDibagi);
            unset($arrDibagi);

            $dataStep1[$i]['persen'] = $dataStep1[$i]['sum'] * 100 / count($selectedGejala);
        }

        return $dataStep1;
    }
}

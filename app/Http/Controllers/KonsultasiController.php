<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Penyakit;
use App\Riwayat;
use DB;
use PDF;

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

        $gejalas = DB::table('gejalas')->whereIn('id', $request->input('gejala'))->get();
        
    	$penyakits = Penyakit::orderBy('id', 'asc')->get();

        $dataStep1 = $this->prosesStep1($penyakits, $request);

        $response = $this->prosesStep2($dataStep1, $request);

        $hasil = collect($response)
                        ->sortByDesc(function($value, $key) {
                            return $value['persen'];
                        })
                        ->values()
                        ->first();

        $riwayat = new Riwayat;
        $riwayat->nama = title_case($request->input('nama'));
        $riwayat->alamat = title_case($request->input('alamat'));
        $riwayat->pekerjaan = title_case($request->input('pekerjaan'));
        $riwayat->gejala = serialize($gejalas);
        $riwayat->response = serialize($response);
        $riwayat->hasil = serialize($hasil);
        $riwayat->save();

    	return redirect()->route('konsultasi.result', $riwayat->id);
    }

    public function result($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        $penyakit = Penyakit::find(unserialize($riwayat->hasil)['penyakit_id']);

        return view('konsultasi.result', compact('riwayat', 'penyakit'));
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

    public function cetak($id)
    {
        return redirect()->route('konsultasi.pdf', [$id, time()]);
    }

    public function pdf($id, $time)
    {
        $riwayat = Riwayat::findOrFail($id);
        $penyakit = Penyakit::find(unserialize($riwayat->hasil)['penyakit_id']);

        $pdf = PDF::loadView('konsultasi.pdf',compact('riwayat', 'penyakit'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('konsultasi-'.$time.'.pdf');
    }
}

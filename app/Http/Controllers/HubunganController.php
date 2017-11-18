<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hubungan;
use App\Penyakit;
use App\Gejala;
use PDF;
use DB;

class HubunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->input('q');

        $limit = 10;

        if ($request->has('page')) {
            $page = $request->input('page');;
        } else {
            $page = 1;
        }

        $no = ($limit*$page) - ($limit-1);

        $hubungans = Hubungan::orderBy('id', 'asc')->search($q)->paginate($limit);

        $penyakits = Penyakit::orderBy('id', 'asc')->get();

        return view('admin.hubungan.index', compact('q', 'no', 'hubungans', 'penyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $penyakits = Penyakit::orderBy('id', 'asc')->get();
        $gejalas = Gejala::orderBy('id', 'asc')
                    ->whereNotExists(function ($query) use ($request) {
                        $query->select(DB::raw(1))
                                ->from('gejala_penyakit')
                                ->where('penyakit_id', $request->penyakit)
                                ->whereRaw('gejalas.id = gejala_penyakit.gejala_id');
                    })
                    ->get();

        return view('admin.hubungan.create', compact('penyakits', 'gejalas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'penyakit' => 'required|numeric',
                'gejala' => 'required|numeric',
                'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
            ]);

        $penyakit = Penyakit::findOrFail($request->input('penyakit'));
        $penyakit->gejalas()->attach($request->input('gejala'), ['bobot' => $request->input('bobot')]);

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('hubungan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hubungan = Hubungan::findOrFail($id);
        $penyakits = Penyakit::orderBy('name', 'asc')->get();
        $gejalas = Gejala::orderBy('name', 'asc')->get();

        return view('admin.hubungan.edit', compact('hubungan', 'penyakits', 'gejalas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hubungan = Hubungan::findOrFail($id);

        $this->validate($request, [
                'penyakit' => 'required|numeric',
                'gejala' => 'required|numeric',
                'bobot' => 'required|min:3|max:3|regex:/^[0-9\.]*$/iu',
            ]);

        $penyakit = Penyakit::findOrFail($hubungan->penyakit_id);
        $penyakit->gejalas()->detach($request->input('gejala'));
        $penyakit->gejalas()->attach($request->input('gejala'), ['bobot' => $request->input('bobot')]);

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('hubungan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hubungan = Hubungan::findOrFail($id);
        $hubungan->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('hubungan.index');
    }

    public function cetak()
    {
        return redirect()->route('hubungan.pdf', time());
    }

    public function pdf($time)
    {
        $hubungans = Hubungan::orderBy('penyakit_id', 'asc')->get();

        $no = 1;

        $pdf = PDF::loadView('admin.hubungan.pdf',compact('hubungans', 'no'))
            ->setPaper('a4', 'potrait');

        return $pdf->stream('data_hubungan-'.$time.'.pdf');
    }
}

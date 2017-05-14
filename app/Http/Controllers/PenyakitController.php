<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use PDF;

class PenyakitController extends Controller
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

        $penyakits = Penyakit::latest()->search($q)->paginate($limit);

        return view('admin.penyakit.index', compact('q', 'no', 'penyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.penyakit.create');
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
                'penyakit' => 'required|min:3|max:150',
                'probabilitas' => 'required|min:7|max:7|regex:/^[0-9\.]*$/iu',
            ]);

        $penyakit = new Penyakit;
        $penyakit->name = title_case($request->input('penyakit'));
        $penyakit->probabilitas = $request->input('probabilitas');
        $penyakit->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('penyakit.index');
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
        $penyakit = Penyakit::findOrFail($id);

        return view('admin.penyakit.edit', compact('penyakit'));
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
        $penyakit = Penyakit::findOrFail($id);

        $this->validate($request, [
                'penyakit' => 'required|min:3|max:150',
                'probabilitas' => 'required|min:7|max:7|regex:/^[0-9\.]*$/iu',
            ]);

        $penyakit->name = title_case($request->input('penyakit'));
        $penyakit->probabilitas = $request->input('probabilitas');
        $penyakit->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('penyakit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('penyakit.index');
    }

    public function cetak()
    {
        return redirect()->route('penyakit.pdf', time());
    }

    public function pdf($time)
    {
        $penyakits = Penyakit::orderBy('name', 'asc')->get();

        $no = 1;

        $pdf = PDF::loadView('admin.penyakit.pdf',compact('penyakits', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_penyakit-'.$time.'.pdf');
    }
}

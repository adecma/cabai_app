<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use PDF;

class GejalaController extends Controller
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

        $gejalas = Gejala::latest()->search($q)->paginate($limit);

        return view('admin.gejala.index', compact('q', 'no', 'gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gejala.create');
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
                'gejala' => 'required|min:10|max:200',
            ]);

        $gejala = new Gejala;
        $gejala->name = title_case($request->input('gejala'));
        $gejala->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data disimpan.');

        return redirect()->route('gejala.index');
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
        $gejala = Gejala::findOrFail($id);

        return view('admin.gejala.edit', compact('gejala'));
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
        $gejala = Gejala::findOrFail($id);

        $this->validate($request, [
                'gejala' => 'required|min:10|max:200'
            ]);

        $gejala->name = title_case($request->input('gejala'));
        $gejala->save();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data diperbaharui.');

        return redirect()->route('gejala.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('gejala.index');
    }

    public function cetak()
    {
        return redirect()->route('gejala.pdf', time());
    }

    public function pdf($time)
    {
        $gejalas = Gejala::orderBy('name', 'asc')->get();

        $no = 1;

        $pdf = PDF::loadView('admin.gejala.pdf',compact('gejalas', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_gejala-'.$time.'.pdf');
    }
}

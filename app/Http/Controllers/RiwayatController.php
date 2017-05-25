<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Riwayat;
use App\Penyakit;
use PDF;

class RiwayatController extends Controller
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

        $riwayats = Riwayat::latest()->search($q)->paginate($limit);

        return view('admin.riwayat.index', compact('q', 'no', 'riwayats'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id);

        $penyakit = Penyakit::find(unserialize($riwayat->hasil)['penyakit_id']);

        return view('admin.riwayat.show', compact('riwayat', 'penyakit'));
    }

    public function showCetak($id)
    {
        return redirect()->route('riwayat.showPdf', [$id, time()]);
    }

    public function showPdf($id, $time)
    {
        $riwayat = Riwayat::findOrFail($id);
        $penyakit = Penyakit::find(unserialize($riwayat->hasil)['penyakit_id']);

        $no = 1;

        $pdf = PDF::loadView('admin.riwayat.showPdf',compact('riwayat', 'penyakit', 'no'))
            ->setPaper('a4', 'landscape');
 
        return $pdf->stream('data_detail_riwayat-'.$time.'.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();

        session()->flash('notifikasi', '<strong>Berhasil!</strong> Data dihapus.');

        return redirect()->route('riwayat.index');
    }

    public function cetak()
    {
        return redirect()->route('riwayat.pdf', time());
    }

    public function pdf($time)
    {
        $riwayats = Riwayat::orderBy('created_at', 'desc')->get();

        $no = 1;

        $pdf = PDF::loadView('admin.riwayat.pdf',compact('riwayats', 'no'))
            ->setPaper('a4', 'potrait');
 
        return $pdf->stream('data_riwayat-'.$time.'.pdf');
    }
}

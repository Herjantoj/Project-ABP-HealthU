<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index() {
        $data = Dokter::all();
        return view('dokter.datadokter', compact('data'));
    }

    public function TambahDataDokter()
    {
        return view('dokter.tambahdata');
    }

    public function InsertDataDokter(Request $request){
        Dokter::create($request->all());
        return redirect()->route('dokter')->with('success', 'Data Dokter Berhasil Ditambahkan');
    }

    public function TampilkanData($id){
        $data = Dokter::find($id);
        return view('dokter.tampildata', compact('data'));
    }

    public function UpdateData(Request $request, $id){
        $data = Dokter::find($id);
        $data->update($request->all());
        return redirect()->route('dokter')->with('success', 'Data Dokter Berhasil Diupdate');
    }

    public function DeleteData($id){
        $data = Dokter::find($id);
        $data->delete();
        return redirect()->route('dokter')->with('success', 'Dokter Berhasil Dihapus');
    }
}

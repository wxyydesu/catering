<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('paket.index', [
            'title' => 'Admin',
            'menu' => 'Food Package',
            'datas' => Paket::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paket.create', [
            'title' => 'Admin',
            'menu' => 'Food Package'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $namaPaket = DB::table('pakets')->where('nama_paket', '=', $request->nama_paket)->value('nama_paket');
        // dd($request);
        if ($namaPaket){
             return view('paket.create', [
                 'title' => 'Admin',
                 'menu' => 'Food Package',
                 'namaPaket' => $request->nama_paket,
                 'jenis' => $request->jenis,
                 'kategori' => $request->kategori,
                 'jumlahPax' => $request->jumlah_pax,
                 'hargaPaket' => $request->harga_paket,
                 'deskripsi' => $request->deskripsi,
                 'pesan' => 'Package ' . $request['nama_paket'] . ' is already exist'

            ]);
            // return redirect()->route('paket.create')->with('duplikat', 
            // 'Package '. $request['nama_paket'] . '  is already in the database! ');
        }else{
        $data = $request->only([
            'nama_paket', 'jenis', 'kategori', 'jumlah_pax', 'harga_paket', 'deskripsi'
        ]);
        if ($request->file('foto1') !== null) $data['foto1'] = $request->file('foto1')->store('Foto_Paket');
        if ($request->file('foto2') !== null) $data['foto2'] = $request->file('foto2')->store('Foto_Paket');
        if ($request->file('foto3') !== null) $data['foto3'] = $request->file('foto3')->store('Foto_Paket');
        $simpan = Paket::create($data);
        if($simpan){
            return redirect()->route('paket.index')->with('pesan', 'The new ' . $data['nama_paket'] . ' package  was successfully saved!');

        }

            // return view('paket.index', [
            //     'title' => 'Admin',
            //     'menu' => 'Food Package',
            //     'pesan' => 'Good Job, The new ' . $data['nama_paket'] . 'Package was successfully saved!, success'
            // ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::find($id);
        return view('paket.edit', [
            'title' => 'Admin',
            'menu' => 'Food Package',
            'data' => $paket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
$nama_paket = $request->nama_paket;
$nama_paket_lama = DB::table('pakets')
->where('id', '=', $id)
->value('nama_paket');
// dd('nama paket baru: ' . $nama_paket .' Nama paket Lama: ' .$nama_paket_lama);

if(trim($nama_paket) == trim($nama_paket_lama)){
$data = Paket::find($id);
$data->nama_paket = $request->nama_paket;
$data->jenis = $request->jenis;
$data->kategori = $request->kategori;
$data->jumlah_pax = $request->jumlah_pax;
$data->harga_paket = $request->harga_paket;
$data->deskripsi = $request->deskripsi;
$foto1_lama = Paket::find($id)->value('foto1');
$foto2_lama = Paket::find($id)->value('foto2');
$foto3_lama = Paket::find($id)->value('foto3');

if($request->file('foto1') !== null){
$data['foto1'] = $request->file('foto1')->store('Foto_Paket');
Storage::delete($foto1_lama);
}

if($request->file('foto2') !== null){
$data['foto2'] = $request->file('foto2')->store('Foto_Paket');
Storage::delete($foto2_lama);
}

if($request->file('foto3') !== null){
$data['foto3'] = $request->file('foto3')->store('Foto_Paket');
Storage::delete($foto3_lama);
}

$data->save();
return redirect()->route('paket.index')->with('pesan', 'Food Package '
. $nama_paket_lama .
' Data has been successfully edited!');
}else if(trim($nama_paket) !== trim($nama_paket_lama)){
$nama_paket_baru = DB::table('pakets')
->where('nama_paket', '=', $request->nama_paket)
->value('nama_paket');

if($nama_paket_baru){
return redirect()->route('paket.edit', $id)->with('pesan', 'Food Package Name '
. $request->nama_paket .
' Data is already in the Database!')->withInput();

}else{
$data = Paket::find($id);
$data->nama_paket = $request->nama_paket;
$data->jenis = $request->jenis;
$data->kategori = $request->kategori;
$data->jumlah_pax = $request->jumlah_pax;
$data->harga_paket = $request->harga_paket;
$data->deskripsi = $request->deskripsi;
$foto1_lama = Paket::find($id)->value('foto1');
$foto2_lama = Paket::find($id)->value('foto2');
$foto3_lama = Paket::find($id)->value('foto3');

if($request->file('foto1') !== null){
$data['foto1'] = $request->file('foto1')->store('Foto_Paket');
Storage::delete($foto1_lama);
}
if($request->file('foto2') !== null){
$data['foto2'] = $request->file('foto2')->store('Foto_Paket');
Storage::delete($foto2_lama);
}

if($request->file('foto3') !== null){
$data['foto3'] = $request->file('foto3')->store('Foto_Paket');
Storage::delete($foto3_lama);
}
$data->save();
return redirect()->route('paket.index')->with('pesan', 'Food Package '
. $nama_paket_lama .
' Data has been successfully edited!' );
}
}
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        // Paket::DB ($id)->delete();
        $foto1 = Paket::find($id)->value('foto1');
        $foto2 = Paket::find($id)->value('foto2');
        $foto3 = Paket::find($id)->value('foto3');
        if($foto1 !== null) Storage::delete($foto1);
        if($foto2 !== null) Storage::delete($foto2);
        if($foto3 !== null) Storage::delete($foto3);
        Paket::find ($id)->delete();
        return redirect()->route('paket.index')->with('pesan', 'The package you selected has been successfully deleted');
        
    }
}
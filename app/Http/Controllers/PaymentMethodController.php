<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\DetailPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    //
    public function index(){
        return view('payment_method.index', [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'datas' => DetailPaymentMethod::all()
        ]);
    }

    public function create(){
        return view('payment_method.create', [
            'title' => 'Admin',
            'menu' => 'Payment Method'
        ]);
    }

    public function store(Request $request)
    {
        if(!$request->id_jenis_pembayaran){
            $metode_pembayaran = DB::table('jenis_pembayarans')->where('metode_pembayaran', '=',
            $request->metode_pembayaran)
            ->value('metode_pembayaran');

            // dd($metode_pembayaran);
            if($metode_pembayaran){
                return redirect()->route('payment_method.create')->with('duplikat', 'Payment Method '
                        . $request->metode_pembayaran .
                        ' Data is already in the Database!')->withInput();
            }else{
                $data_payment = $request->only([
                    'metode_pembayaran'
                ]);

                $simpan_payment = PaymentMethod::create($data_payment);

                if($simpan_payment){
                    $id = DB::table('jenis_pembayarans')
                    ->where('metode_pembayaran', '=', $request->metode_pembayaran)
                    ->value('id');

                    $data_detail = $request->only([
                        'no_rek',
                        'tempat_bayar'
                    ]);
                    // dd($request);
                    $data_detail['id_jenis_pembayaran'] = $id;
                    if($request->file('logo') !== null) $data_detail['logo'] = $request->file('logo')->store
                    ('Logos');
                    $simpan_detail = DetailPaymentMethod::create($data_detail);
                    if($simpan_detail){
                        return redirect()->route('payment_method.create')->with('simpan',
                            'The new ' . $request->metode_pembayaran . ' Payment Method was successfully saved!'
                            )->with('id', $id)->with('payment', $request->metode_pembayaran);
                        }
                    }
                }
            } else{
                $tempat = DB::table('detail_jenis_pembayarans')->where('id_jenis_pembayaran', '=',
                $request->id_jenis_pembayaran)->where('tempat_bayar', '=', $request->tempat_bayar)
                ->value('tempat_bayar');
                // dd($request);
                if($tempat){
                return redirect()->route('payment_method.create')->with('duplikat', ucfirst(strtolower
                ($request->metode_pembayaran)) . ' '
                                    . $request->tempat_bayar .
                                    ' is already in the Database!')->withInput();
                }else{
                    $data_detail = $request->onlv([
                        'id_jenis_pembayaran',
                        'no_rek',
                        'tempat_bayar'
                    ]);
                    if($request>file('logo') !== null) $data_detail['logo'] = $request->file('logo')->store('Logos');
                    $simpan_detail = DetailPaymentMethod::create($data_detail);
                    if($simpan_detail){
                        return redirect()->route('payment_method.create')->with('simpan',
                                'The new ' . $request->metode_pembayaran . ' Payment Method was successfully saved!'
                                )->with('id', $request->id_jenis_pembayaran)->with('payment',
                                $request->metode_pembayaran);
                    }
                }
            }              
    }
    public function show(string $id){
        //
    }
    public function edit(string $id){
        $paymentmethod = DetailPaymentMethod::find($id);
        return view( 'payment_method.edit', [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'data' => $paymentmethod
        ]);
    }
    public function destroy(string $id){
        //
    }
    public function add(string $id, string $payment_methode){
        //dd($id . "" . $payment_methode);
        $id = DetailPaymentMethod::find($id)->id;
        $methode_pembayaran = PaymentMethod::find($id)->metode_pembayaran;
        return view('payment_method.add', [
            'title' => 'Admin',
            'menu' => 'Payment Method',
            'id' => $id,
            'payment_methode' => $methode_pembayaran
        ]);
    }

    public function tambah(Request $request){
        $tempat = DB::table('detail_jenis_pembayarans')->where('id_jenis_pembayaran', '=',
        $request->id_jenis_pembayaran)->where('tempat_bayar', '=', $request->tempat_bayar)
        ->value('tempat_bayar');
        //dd($request);
        if($tempat){
            return redirect()->route('add', [$request->id_jenis_pembayaran, $request->metode_pembayaran])->with('duplikat', ucfirst(strtolower($request->metode_pembayaran)) . ' '
            . $request->tempat_bayar .
            ' is already in the Database!')->withInput();

        }else{
            $data_detail = $request->only([
            'id_jenis_pembayaran',
            'no_rek',
            'tempat_bayar'
        ]);
        //dd($request);
        if($request->file('logo') !== null) $data_detail['logo'] = $request->file('logo')->store('Logos');
        $simpan_detail = DetailPaymentMethod::create($data_detail);
        if($simpan_detail){
            return redirect()->route('add', [$request->id_jenis_pembayaran, $request->metode_pembayaran])->with
            ('simpan', 'New ' . ucfirst(strtolower($request->metode_pembayaran)) . '' 
            . $request->tempat_bayar .
            ' was successfully saved!')->with('id', $request->id_jenis_pembayaran)->with('payment', $request->metode_pembayaran);
        
        }
        }
    }
}

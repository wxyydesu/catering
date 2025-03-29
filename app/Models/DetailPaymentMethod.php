<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'detail_jenis_pembayarans';
    protected $fillable = [
        'id_jenis_pembayaran',
        'no_rek',
        'tempat_bayar',
        'logo'
    ];

    public function vwPaymentMethod(){
        return $this->belongsTo(PaymentMethod::class, 'id_jenis_pembayaran', 'id');
    }
}

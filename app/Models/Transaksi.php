<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'obat_id',
        'jumlah',
        'total_harga',
        'tanggal_transaksi',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}

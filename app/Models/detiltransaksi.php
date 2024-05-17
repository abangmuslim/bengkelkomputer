<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detiltransaksi extends Model
{
    protected $fillable=['transaksi_id','layanan_id','jumlah','harga'];
    use HasFactory;

    public function transaksi():BelongsTo
    {
        return $this->belongsTo(transaksi::class);
    }

    public function layanan():BelongsTo
    {
        return $this->belongsTo(layanan::class);
    }
}


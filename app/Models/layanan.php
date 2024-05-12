<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class layanan extends Model
{
    
    use HasFactory;
    protected $fillable=['nama','jeniskategori','suplier_id', 'teknisi_id', 'deskripsi','stock','harga'];

    public function detiltransaksi():HasMany
    {
        return $this->hasMany(Detiltransaksi::class);
    }

    public function teknisi():BelongsTo
    {
        return $this->belongsTo(Teknisi::class);
    }

    public function suplier():BelongsTo
    {
        return $this->belongsTo(Suplier::class);
    }
}

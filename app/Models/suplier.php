<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Suplier extends Model
{
    use HasFactory;
    protected $fillable=['nama','tanggalmou','hp','alamat'];

    public function transaksi():HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}


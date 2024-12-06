<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_antrean', 'locket_id',];


    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }
}

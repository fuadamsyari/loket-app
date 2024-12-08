<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\BuilderHelpers;

class Antrean extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_antrean', 'loket_id']; // perbaiki penulisan 'loket_id'

    // Scope untuk mengambil antrean berdasarkan loket dan dikelompokkan berdasarkan status
    public function scopeByLoketAndGroupedStatus($query, $idLoket)
    {
        return $query->where('loket_id', $idLoket)
            ->whereIn('status', ['menunggu', 'diproses', 'selesai'])
            ->get()
            ->groupBy('status');
    }

    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }
}

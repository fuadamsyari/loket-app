<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kode_loket', 'nama_loket', 'deskripsi'];

    public function antreans()
    {
        return $this->hasMany(Antrean::class);
    }
}

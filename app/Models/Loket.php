<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kode_loket', 'nama_loket', 'deskripsi'];


    // Fungsi untuk menghasilkan kode_loket baru
    public static function generateKodeLoket()
    {
        // Ambil kode_loket terakhir dari database
        $lastKode = self::max('kode_loket'); // Menggunakan self karena ini method statis

        // Jika tidak ada kode_loket, mulai dari "A"
        if (!$lastKode || !preg_match('/^[A-Z]+$/', $lastKode)) {
            return 'A'; // Pastikan hanya alfabet yang diproses
        }

        // Generate kode berikutnya
        return self::incrementKode($lastKode);
    }
    // Fungsi untuk menghitung kode berikutnya
    private static function incrementKode($kode)
    {
        $length = strlen($kode);
        $index = $length - 1;

        // Proses increment karakter dari belakang
        while ($index >= 0) {
            if ($kode[$index] !== 'Z') {
                $kode[$index] = chr(ord($kode[$index]) + 1);
                return $kode;
            }
            $kode[$index] = 'A'; // Reset ke 'A'
            $index--;
        }

        // Jika semua karakter adalah 'Z', tambahkan karakter baru di depan
        return 'A' . $kode;
    }

    public function antreans()
    {
        return $this->hasMany(Antrean::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

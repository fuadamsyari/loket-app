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
        // Ambil semua kode_loket dari database, urutkan secara alfabet
        $existingCodes = self::pluck('kode_loket')->sort()->toArray();

        // Cari kode alfabet yang kosong
        $currentCode = 'A'; // Mulai dari 'A'
        foreach ($existingCodes as $code) {
            if ($code !== $currentCode) {
                return $currentCode; // Kode yang kosong
            }
            $currentCode++; // Increment ke huruf berikutnya
        }

        // Tentukan panjang maksimal berdasarkan kode_loket terpanjang di database
        $maxLength = self::maxLengthFromDatabase();

        // Jika semua kode terisi, tambahkan kode baru setelah yang terakhir
        return self::incrementKode($currentCode, $maxLength);
    }

    // Fungsi untuk menghitung kode berikutnya
    private static function incrementKode($kode, $maxLength)
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

        // Jika semua karakter adalah 'Z' dan panjang belum mencapai $maxLength, tambahkan karakter baru di depan
        return strlen($kode) < $maxLength ? 'A' . $kode : $kode;
    }

    // Fungsi untuk mendapatkan panjang maksimal kode_loket dari database
    private static function maxLengthFromDatabase()
    {
        $maxKode = self::max('kode_loket');
        return $maxKode ? strlen($maxKode) : 1; // Jika belum ada kode, panjang dimulai dari 1
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

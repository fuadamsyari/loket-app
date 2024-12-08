<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Loket;
use App\Models\Antrean;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        Loket::create([
            'user_id' => '1',
            'kode_loket' => 'A',
            'nama_loket' => 'DJP',
            'deskripsi' => 'Kantor Pelayanan Direktorat Jendral Pajak'
        ]);
        Loket::create([
            'user_id' => '2',
            'kode_loket' => 'B',
            'nama_loket' => 'Samsat',
            'deskripsi' => 'Kantor Pelayanan Samsat'
        ]);
        Loket::create([
            'user_id' => '3',
            'kode_loket' => 'C',
            'nama_loket' => 'BPJS',
            'deskripsi' => 'Kantor Pelayanan BPJS'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

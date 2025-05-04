<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('kelas')->insert([
            [
                'kode_kelas' => '--',
                'nama_kelas' => '--',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'kode_kelas' => 'X MM 2',
            //     'nama_kelas' => 'X Multimedia 2',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'kode_kelas' => 'XI MM',
            //     'nama_kelas' => 'XI Multimedia',
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);

        DB::table('siswas')->insert([
            [
                'nis' => '--',
                'nama' => '--',
                'jenis_kelamin' => 'LAKI-LAKI',
                'alamat' => '--',
                'kelas_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'role' => 'superAdmin',
                'siswa_id' => 1,
                'password' => Hash::make('password'),
            ]]);

        // DB::table('tatibs')->insert([
        //     [
        //         'kode_tatib' => 'AP1',
        //         'item_tatib' => 'ALPA',
        //         'kategori' => 'RINGAN',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_tatib' => 'AP2',
        //         'item_tatib' => 'TERLAMBAT',
        //         'kategori' => 'SEDANG',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_tatib' => 'AP3',
        //         'item_tatib' => 'BOLOS',
        //         'kategori' => 'BERAT',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);

        // DB::table('sanksis')->insert([
        //     [
        //         'kode_sanksi' => 'S01',
        //         'item_sanksi' => 'Peringatan Lisan',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_sanksi' => 'S02',
        //         'item_sanksi' => 'Membersihkan',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_sanksi' => 'S03',
        //         'item_sanksi' => 'Surat Pernyataan I',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_sanksi' => 'S04',
        //         'item_sanksi' => 'Surat Pernyataan II',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_sanksi' => 'S05',
        //         'item_sanksi' => 'Skorsing',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'kode_sanksi' => 'S06',
        //         'item_sanksi' => 'Rekomendasi Keluar',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}

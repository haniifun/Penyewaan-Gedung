<?php

use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed tabel gedung berisi data gedung
        DB::table('gedung')->insert([
            ['nama' => 'Gedung Kumbang', 'harga' => 4000000, 'luas' => 350, 'foto' => 'wisuda_jakbar.jpg', 'deskripsi' => 'Gedung ini berada di daerah jakarta barat dengan luas 350m2 dan berada di Jl Kumbang No.35'],
            ['nama' => 'Gedung Menteng', 'harga' => 5000000, 'luas' => 300, 'foto' => 'gedungmtng.jpg', 'deskripsi' => 'Gedung ini berada di daerah Jakarta Barat dengan luas 300m2 dan berada di jalan Menteng No,31'],
            ['nama' => 'Gedung Rawa lele', 'harga' => 6000000, 'luas' => 400, 'foto' => 'gedungrw.JPG', 'deskripsi' => 'Gedung yang berada di Jakarta Barat. Jl. Rawa lele no 15 Jakarta Barat'],
            ['nama' => 'Gedung Margonda', 'harga' => 4500000, 'luas' => 300, 'foto' => 'gedung.jpg', 'deskripsi' => 'Gedung ini berada di depok pada Jalan Margonda No.34, Depok'],
            ['nama' => 'Gedung Edelweiss', 'harga' => 5000000, 'luas' => 350, 'foto' => 'edelweiss.jpg', 'deskripsi' => 'Gedung ini berada di jalan karawaci, Gedung edelweiss no.1 dan 2, cibodas, Tangerang city, Banten'],
            ['nama' => 'Gedung Mila kencana', 'harga' => 6500000, 'luas' => 450, 'foto' => 'mila_kencana.jpg', 'deskripsi' => 'Gedung ini berada di komplek GOR Padjajaran Kota Bogor'],
           
        ]);
    }
}

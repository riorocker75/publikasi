<?php

use Illuminate\Database\Seeder;
use App\Model\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Kategori_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->delete();
        Kategori::create([
            'id' => '1',
            'nama' => 'Artikel ilmiah',
            'slug' => 'artikel-ilmiah',
        ]);
        Kategori::create([
            'id' => '2',
            'nama' => 'Sertifikat',
            'slug' => 'sertifikat',
        ]);
    }
}

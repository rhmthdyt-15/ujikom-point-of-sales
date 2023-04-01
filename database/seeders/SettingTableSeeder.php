<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'Mat Toko',
            'alamat' => 'Jl. Kibandang Samaran Ds. Slangit',
            'telepon' => '081534779687',
            'tipe_nota' => 2, // besar
            'diskon' => 5,
            'path_logo' => '/templates/images/logo3.png',
            'path_kartu_member' => '/images/member.png',
        ]);
    }
}

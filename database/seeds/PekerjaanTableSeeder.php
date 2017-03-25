<?php

use Illuminate\Database\Seeder;

class PekerjaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pekerjaans')->insert([
            [
                'deskripsi' => 'Pegawai Negeri Sipil'
            ],

            [
                'deskripsi' => 'Pegawai Swasta'
            ],

            [
                'deskripsi' => 'Ibu Rumah Tangga'
            ],

            [
                'deskripsi' => 'Wiraswasta'
            ],

            [
                'deskripsi' => 'Programmer'
            ],
        ]);
    }
}

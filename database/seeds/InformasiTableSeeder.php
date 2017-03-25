<?php

use Illuminate\Database\Seeder;

class InformasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informasis')->insert([
            [
                'deskripsi' => 'Teman'
            ],

            [
                'deskripsi' => 'Saudara'
            ],

            [
                'deskripsi' => 'Kolega'
            ],

            [
                'deskripsi' => 'Koran'
            ],

            [
                'deskripsi' => 'Televisi'
            ],

            [
                'deskripsi' => 'Brosur'
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KejuruanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kejuruans')->insert([
            [
                'deskripsi' => 'AutoCAD Manufaktur'
            ],

            [
                'deskripsi' => 'AutoCAD Sipil'
            ],

            [
                'deskripsi' => 'Teknik Informasi dan Komunikasi'
            ],
        ]);
    }
}

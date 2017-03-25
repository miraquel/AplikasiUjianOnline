<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agamas')->insert([
            [
                'deskripsi' => 'Islam'
            ],

            [
                'deskripsi' => 'Kristen'
            ],

            [
                'deskripsi' => 'Buddha'
            ],

            [
                'deskripsi' => 'Konghuchu'
            ],

            [
                'deskripsi' => 'Hindu'
            ],
        ]);
    }
}

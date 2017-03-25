<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'deskripsi' => 'Menikah'
            ],

            [
                'deskripsi' => 'Belum Menikah'
            ],

            [
                'deskripsi' => 'Cerai Hidup'
            ],

            [
                'deskripsi' => 'Cerai Mati'
            ],
        ]);
    }
}

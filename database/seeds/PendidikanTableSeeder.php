<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PendidikanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendidikans')->insert([
            [
                'deskripsi' => 'SD'
            ],

            [
                'deskripsi' => 'SMP'
            ],

            [
                'deskripsi' => 'SMA'
            ],

            [
                'deskripsi' => 'S1'
            ],

            [
                'deskripsi' => 'S2'
            ],

            [
                'deskripsi' => 'S3'
            ],
        ]);
    }
}

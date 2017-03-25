<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Chaidir Ali Assegaf',
                'email' => 'ading.assegaf@gmail.com',
                'password' => bcrypt('Skateboars1'),
                'role_id' => '1',
            ],
            [
                'name' => 'Siti Mulyani',
                'email' => 'sitmulyani1895@gmail.com',
                'password' => bcrypt('rahasia'),
                'role_id' => '2',
            ],
        ]);
    }
}

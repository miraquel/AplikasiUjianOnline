<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AgamaTableSeeder::class);
        $this->call(InformasiTableSeeder::class);
        $this->call(KejuruanTableSeeder::class);
        $this->call(PekerjaanTableSeeder::class);
        $this->call(PendidikanTableSeeder::class);
        $this->call(StatusTableSeeder::class);
    }
}

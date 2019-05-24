<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        //$this->call(PaisesTableSeeder::class);
        //$this->call(EstadosTableSeeder::class);
        // $this->call(CidadesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(PersonasTableSeeder::class);
        //$this->call(AddressesTableSeeder::class);
        //$this->call(PhonesTableSeeder::class);
        //$this->call(AttributesTableSeeder::class);
        //$this->call(QualificationsTableSeeder::class);
        //$this->call(KindsTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Address;

class PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Persona::class, 80)->create();
    }
}

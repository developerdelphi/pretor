<?php

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personas = Persona::all();
        $personas->each(
            function($personas)
            {
                factory(Address::class, rand(1,2))
                    ->create(
                    [
                        'persona_id'    => $personas->id,
                    ]
                );
            }
        );
    }
}

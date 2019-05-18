<?php

use Illuminate\Database\Seeder;
use App\Models\Phone;
use App\Models\Persona;

class PhonesTableSeeder extends Seeder
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
                factory(Phone::class, rand(1,2))
                    ->create(
                    [
                        'persona_id'    => $personas->id,
                    ]
                );
            }
        );
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Qualification;
use App\Models\Attribute;
use App\Models\Persona;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Pega todas as Persona inseridas no seed antes de executar este seed
         */
        $personas = Persona::all();
        /**
         * Pega todos os Attributes que devem estar inseridos antes deste seed
         */
       // $attributes = Attribute::all();
        /**
         * Para cada Persona executa a quantidade de Qualification de $qualiQtde
        */
        //dd($attributes->random()->id);

        $qualiQtde = 5;
        $personas->each(
            function($personas) use ($qualiQtde)
            {
                factory(Qualification::class, $qualiQtde)
                    ->create(
                    [
                        'persona_id'    => $personas->id,
                        'attribute_id'  => function () {
                            // Get random genre id
                            return Attribute::inRandomOrder()->first()->id;
                        },
                        //'value'         => $faker->unique()->word,
                    ]
                );
            }
        );
    }
}

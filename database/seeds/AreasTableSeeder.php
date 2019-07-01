<?php

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'name' => 'Penal',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Previdenciário',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Ambiental',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Ambiental',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Previdenciário',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Cível',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Penal',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Família',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Consumidor',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Trabalhista',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Família',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Cível',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Tributário',
                'origin' => 'Judicial'
            ],
            [
                'name' => 'Tributário',
                'origin' => 'Administrativo'
            ],
            [
                'name' => 'Eleitoral',
                'origin' => 'Judicial'
            ]
        ];
        //factory(Area::class, 10)->create();
        foreach ($items as $item) {
            Area::create($item);
        }
    }
}

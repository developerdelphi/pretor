<?php

use Illuminate\Database\Seeder;
use App\Models\Kind;

class KindsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Kind::class, 10)->create();
        $items = [
            [
                'name' => 'Aposentadoria por Idade',
                'area_id' => 2
            ],
            [
                'name' => 'Aposentadoria por Tempo de Contribuição',
                'area_id' => 2
            ],
            [
                'name' => 'Aposentadoria Especial - Trabalhador Rural',
                'area_id' => 2
            ],
            [
                'name' => 'Auxílio Doença',
                'area_id' => 2
            ],
            [
                'name' => 'LOAS',
                'area_id' => 2
            ], [
                'name' => 'Ação de Aposentadoria por Idade',
                'area_id' => 5
            ],
            [
                'name' => 'ação de Aposentadoria por Tempo de Contribuição',
                'area_id' => 5
            ],
            [
                'name' => 'Ação de Aposentadoria Especial - Trabalhador Rural',
                'area_id' => 5
            ],
            [
                'name' => 'Ação de Auxílio Doença c/c Aposentadoria por Invalidez',
                'area_id' => 5
            ],
            [
                'name' => 'Ação de Requerimento de Benefício Assistencial',
                'area_id' => 5
            ],
            [
                'name' => 'Ação de Usucapião',
                'area_id' => 6
            ],
            [
                'name' => 'Ação de Indenização por Danos Materiais e Morais',
                'area_id' => 6
            ],
            [
                'name' => 'Ação de Inventário',
                'area_id' => 8
            ],
            [
                'name' => 'Ação de Alimentos',
                'area_id' => 6
            ],

        ];
        //factory(Area::class, 10)->create();
        foreach ($items as $item) {
            Kind::create($item);
        }
    }
}

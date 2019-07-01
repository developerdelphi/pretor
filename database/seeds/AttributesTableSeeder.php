<?php

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Attribute::class, 10)->create();
        $items = [
            [
                'name' => 'CPF',
                'type' => 'Documento'
            ],
            [
                'name' => 'RG',
                'type' => 'Documento'
            ],
            [
                'name' => 'CNPJ',
                'type' => 'Documento'
            ],
            [
                'name' => 'CTPS',
                'type' => 'Documento'
            ],
            [
                'name' => 'Pessoa',
                'type' => 'Valor'
            ],
            [
                'name' => 'Data de Nascimento',
                'type' => 'Valor'
            ],
            [
                'name' => 'Estado Civil',
                'type' => 'Valor'
            ],

        ];

        foreach ($items as $item) {
            Attribute::create($item);
        }
    }
}

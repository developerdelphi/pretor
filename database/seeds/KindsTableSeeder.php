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
        factory(Kind::class, 10)->create();
    }
}

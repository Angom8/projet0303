<?php

use Illuminate\Database\Seeder;

use App\Type_piece;
class TypePieceTableSeeder extends Seeder {
    public function run()
    {
		$tp = factory(App\Type_piece::class, 36)->create();
    }
}

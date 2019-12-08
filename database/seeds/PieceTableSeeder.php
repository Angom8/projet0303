<?php

use Illuminate\Database\Seeder;

use App\Piece;
class PieceTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Piece::class, 50)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

use App\Message;
class MessageTableSeeder extends Seeder {
    public function run()
    {
		$user = factory(App\Message::class, 20)->create();
    }
}

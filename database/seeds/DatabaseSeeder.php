<?php

use App\Channel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

	        Channel::create([
	            'id' => 1
	        ]);

	        Channel::create([
	            'id' => 2	
	        ]);

	}
}

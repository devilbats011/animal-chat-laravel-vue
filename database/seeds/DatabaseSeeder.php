<?php

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


	        App\Channel::create([
	            'id' => 1
	        ]);

	        App\Channel::create([
	            'id' => 2	
	        ]);

	}
}

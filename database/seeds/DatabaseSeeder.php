<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	//原文该处注释 UserTableSeeder
        $this->call(MyGuestsTableSeeder::class);
    }
}

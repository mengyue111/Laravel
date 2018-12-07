<?php

use Illuminate\Database\Seeder;

class MyGuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('MyGuests')->insert([
        	'firstname'=>str_random(10),
        	'lastname'=>str_random(10),
        	'email'=>str_random(10).'@qq.com',
        	'reg_date'=>date_create(),
        ]);
    }
}

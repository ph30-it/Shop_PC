<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	[
        	'email'=>'vanva123@gmail.com',
        	'password'=>bcrypt('123456'),
        	'level'=>1
        ],
        [
        	'email'=>'admin456@gmail.com',
        	'password'=>bcrypt('123456'),
        	'level'=>1
        ],
    ];
        DB::table('pc_users')->insert($data);
    }
}

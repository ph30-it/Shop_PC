<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
        		'cate_name' => 'Asus',
        		'cate_slug' =>str_slug('Asus')
        	],
        	[
        		'cate_name' => 'Dell',
        		'cate_slug' =>str_slug('Dell')
        	],
        	[
        		'cate_name' => 'Apple',
        		'cate_slug' =>str_slug('Apple')
        	],
        	[
        		'cate_name' => 'Lenovo',
        		'cate_slug' =>str_slug('Lenovo')
        	],
        	[
        		'cate_name' =>'HP',
        		'cate_slug' =>str_slug('HP')
        	],
        	[
        		'cate_name' => 'MSI',
        		'cate_slug' =>str_slug('MSI')
        	],
        	[
        		'cate_name' => 'Acer',
        		'cate_slug' =>str_slug('Acer')
        	],
        	[
        		'cate_name' => 'Razer',
        		'cate_slug' =>str_slug('Razer')
        	],

        ];
        DB::table('categories')->insert($data);
    }
}

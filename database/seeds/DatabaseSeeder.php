<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Category::create([
             'name'=>'laptop',
             'slug'=>'laptop',
             'description'=>'laptop category',
             'image'=>'files/mobile.jpg'
         ]);
        Category::create([
            'name'=>'laptop1',
            'slug'=>'laptop1',
            'description'=>'laptop1 category',
            'image'=>'files/mobile.jpg'
        ]);
        Category::create([
            'name'=>'laptop12',
            'slug'=>'laptop12',
            'description'=>'laptop12 category',
            'image'=>'files/mobile.jpg'
        ]);
        Subcategory::create([
           'name'=>'sony',
            'category_id'=>1
        ]);
        Subcategory::create([
            'name'=>'sony1',
            'category_id'=>2
        ]);
        Subcategory::create([
            'name'=>'sony12',
            'category_id'=>3
        ]);
        Product::create([
           'name'=>'sony laptop',
           'image'=>'product/mobile.jpg',
            'price'=>rand(10000,20000),
            'description'=>'this is the description of a product',
            'additional_info'=>'this is additional information',
            'category_id'=>1,
            'subcategory_id'=>1
        ]);
        Product::create([
            'name'=>'sony laptop1',
            'image'=>'product/mobile.jpg',
            'price'=>rand(20000,40000),
            'description'=>'this is the description of a product',
            'additional_info'=>'this is additional information',
            'category_id'=>2,
            'subcategory_id'=>2
        ]);
        Product::create([
            'name'=>'sony laptop12',
            'image'=>'product/mobile.jpg',
            'price'=>rand(40000,60000),
            'description'=>'this is the description of a product',
            'additional_info'=>'this is additional information',
            'category_id'=>3,
            'subcategory_id'=>3
        ]);
        User::create([
            'name'=>'EcomAdmin',
            'email'=>'rms@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>NOW(),
            'address'=>'Dhaka',
            'phone_number'=>'01847330008',
            'is_admin'=>1
        ]);
        User::create([
            'name'=>'EcomUser',
            'email'=>'user@gmail.com',
            'password'=>bcrypt('password'),
            'email_verified_at'=>NOW(),
            'address'=>'Dhaka',
            'phone_number'=>'01847330008',
            'is_admin'=>0
        ]);
    }
}

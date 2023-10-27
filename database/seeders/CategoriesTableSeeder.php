<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $category1 = Category::create([
            'name' => 'WordPress'
        ]);
        $category2 = Category::create([
            'name' => 'Web'
        ]);
        $category3 = Category::create([
            'name' => 'Android Apps'
        ]);
        $category4 = Category::create([
            'name' => 'IOS Apps'
        ]);
        $category5 = Category::create([
            'name' => 'Games'
        ]);

        // Category WordPress
        Subcategory::create([
            'name' => 'Business',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Portfolio',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Ecommerce',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Company',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Blogs',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'News & Magzine',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Sports',
            'category_id' => $category1->id
        ]);
        Subcategory::create([
            'name' => 'Trivia & Quiz',
            'category_id' => $category1->id
        ]);

        // Category Web
        Subcategory::create([
            'name' => 'Html/Css',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'Bootstrap',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'Js Snippets',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'VueJs',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'ReactJs',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'AngularJs',
            'category_id' => $category2->id
        ]);
        Subcategory::create([
            'name' => 'Php Scripts',
            'category_id' => $category2->id
        ]);

        // Category Android Apps
         Subcategory::create([
            'name' => 'Business',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Portfolio',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Ecommerce',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Company',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Blogs',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'News & Magzine',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Sports',
            'category_id' => $category3->id
        ]);
        Subcategory::create([
            'name' => 'Trivia & Quiz',
            'category_id' => $category3->id
        ]);

        // Category IOS Apps
         Subcategory::create([
            'name' => 'Business',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Portfolio',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Ecommerce',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Company',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Blogs',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'News & Magzine',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Sports',
            'category_id' => $category4->id
        ]);
        Subcategory::create([
            'name' => 'Trivia & Quiz',
            'category_id' => $category4->id
        ]);

        // Category Games
        Subcategory::create([
            'name' => 'Games',
            'category_id' => $category5->id
        ]);
    }
}
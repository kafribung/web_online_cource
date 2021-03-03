<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

use function GuzzleHttp\Promise\each;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect([
            'Laravel',
            'VueJs',
            'ReactJs',
            'NodeJs',
            'PHP',
            'Java',
        ]);

        $categories->each(function($category){
            Category::create([
                'title' => $category,
                'slug'  => \Str::slug($category),
            ]);
        });
    }
}

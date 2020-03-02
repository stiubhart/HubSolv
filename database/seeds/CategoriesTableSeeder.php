<?php

use Illuminate\Database\Seeder;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = File::get("database/Data/books.json");
        $categories = json_decode($categories);

        foreach ($categories as $key => $categoriesCSV) {
            $categoryCSV = explode(',', $categoriesCSV->Category);
            foreach ($categoryCSV as $key2 => $category) {
                $category = trim($category);
                $dbCategory = Category::where('category', $category)->first();

                if (! empty($dbCategory)) continue;

                Category::create([
                    'category' => $category,
                ]);
            }
        }
    }
}

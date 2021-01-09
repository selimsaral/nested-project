<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(2)->create()->each(function ($item) {
            Category::factory(5)->setParentId($item->id)->create()->each(function ($subItem) {
                Category::factory(3)->setParentId($subItem->id)->create();
            });
        });
    }
}

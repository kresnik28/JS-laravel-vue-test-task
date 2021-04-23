<?php

namespace Database\Seeders;

use App\Modules\Category\Models\Category;
use App\Modules\Item\Models\Item;
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
        // \App\Models\User::factory(10)->create();
        Category::factory()->count(10)->create();
        Item::factory()->count(50)->create();
    }
}

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
        Category::insert([
            [
                'name' => 'سيارات',
                'desc' => '',
                'icon' => 'fas fa-bars',
            ],
            [
                'name' => 'تعليم',
                'desc' => '',
                'icon' => 'fas fa-bars',
            ],
            [
                'name' => 'حاسب محمول',
                'desc' => '',
                'icon' => 'fas fa-bars',
            ],
            [
                'name' => 'موضة',
                'desc' => '',
                'icon' => 'fas fa-bars',
            ],
            [
                'name' => 'وظائف',
                'desc' => '',
                'icon' => 'fas fa-bars',
            ],
        ]);
    }
}

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
            ],
            [
                'name' => 'تعليم',
                'desc' => '',
            ],
            [
                'name' => 'حاسب محمول',
                'desc' => '',
            ],
            [
                'name' => 'موضة',
                'desc' => '',
            ],
            [
                'name' => 'وظائف',
                'desc' => '',
            ],
        ]);
    }
}

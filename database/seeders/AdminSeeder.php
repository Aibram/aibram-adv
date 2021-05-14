<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'first_name' => 'Mostafa',
            'last_name' => 'Elsayed',
            'status' => 1,
            'email' => 'mostafa@aibram.com',
            'username' => 'mostafa_aibram',
            'password' => 'mo_aib_stafa_ram',
        ]);
        $admin->assignRole('Super Admin');
    }
}

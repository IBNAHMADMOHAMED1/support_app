<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= [
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => bcrypt('password'),

        ];
        
        Admin::create($admin);

        //
    }
}

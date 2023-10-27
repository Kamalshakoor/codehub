<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('email','admin@gmail.com')->first();

        if(!$admin){
            Admin::create([
                'name' => 'kamal shakoor',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        [
        'full_name' => "Patrick Jane",
        'username' => "Admin",
        'email' => "o.mahdaoui@esi-sba.dz",
        "password" => Hash::make('Omar12452354'),
        'role' => 'admin',
        'status' => 'active'
            
        ],

        [
            'full_name' => " Patrick Vendor",
            'username' => "p.vendor",
            'email' => "vendor@gmail.com",
            "password" => Hash::make('Omar12452354'),
            'role' => 'vendor',
            'status' => 'active'
                
        ],
        [
            'full_name' => "Patrick Customer",
            'username' => "customer",
            'email' => "customer@gmail.com",
            "password" => Hash::make('Omar12452354'),
            'role' => 'customer',
            'status' => 'active'
                
        ]
        
        ]);
    }
    
}

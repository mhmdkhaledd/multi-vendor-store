<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'mohamed',
            'email' => '@mhmdd.com',
            'password' => Hash::make('password'),
            'phone_number' => '1215746'
        ]);
        DB::table('users')->insert([

            'name' => 'ahmed',
            'email' => '@ahmdd.com',
            'password' => Hash::make('password'),
            'phone_number' => '98542421'

        ]);
    }
}

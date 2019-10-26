<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => 'Frank Eugen Chuwa',
            'email' => 'frank.chuwa@ncaa.go.tz', 'role' => 2, 'mobile' => '0655568588',
            'password' => bcrypt('1234567890'),
            'name' => 'Mbekure Sambeke Massey',
            'email' => 'mbekure.sambeke@gmail.com', 'role' => 2, 'mobile' => '0763150172',
            'password' => bcrypt('MIMImkubwa1676')]);
    }
}

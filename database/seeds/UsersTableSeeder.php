<?php

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
          DB::table('users')->insert([
            'username' 		=> 'admin',
            'email' 		=> 'nguyentiendat1892@gmail.com',
            'fname'			=>	'Tien Dat',
            'lname'			=>	'Nguyen',
            'address'		=>	'yen hoa, ha noi',
            'password' 		=>	bcrypt('123123'),
            'gender' 		=> 	'1',
            'birthday' 		=>	'1992-08-01',
            'img'			=>	'',

        ]);
    }
}

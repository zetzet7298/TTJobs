<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'username' => 'dang',
                'email' => 'baythanghai@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0349403089'
            ],
            [
                'username' => 'zet',
                'email' => 'zetzet721998@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0349403088'
            ]
        ];
        DB::table('users')->insert($data);
    }
}

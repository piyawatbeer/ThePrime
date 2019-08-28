<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            'username' => 'admin',
            'password' =>  Hash::make('123456'),
            'email' => 'piyawatbeer@gmail.com',
            'name' => 'ปิยะวัฒน์ อัฒจักร',
            'tel' => '0874487882',
            'line' => '0874487882',
            'facebook' => 'เบียร์ ปิยะวัฒน์',
            'department' => 'MD',
            'user_type' => 'admin',
            'created_at' => date('Y-m-d H:i:s')
        ));
        DB::table('part')->insert(array(
            'name' => 'ส่วนที่ 1 ค่างานต้นทุน',   
            'created_at' => date('Y-m-d H:i:s')
        ));
       
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class user_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(array(
            'name' => 'administrator',
            'email' => str_random(10).'@administrator.com',
            'password' => bcrypt('password'),
        ));
    }
}

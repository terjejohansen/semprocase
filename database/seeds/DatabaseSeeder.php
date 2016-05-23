<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(navigationMenuSeeder::class);
        $this->call(youtubeSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(user_table_seeder::class);
    }
}

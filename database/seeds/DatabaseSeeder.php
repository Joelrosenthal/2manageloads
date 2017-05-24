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
         $this->call(ShipmentsTableSeeder::class);
         $this->call(StoresTableSeeder::class);

         DB::table('users')->insert([
             'name' => 'Mike Cornille',
             'email' => 'mikecornille@gmail.com',
             'password' => bcrypt('password'),
             'remember_token' => 'SMDvF3btchRMWIHKVWcEjVKvpHrIvCr6FCtwSVsBvkQct39lY5eCibZrgqxW'
         ]);
    }
}

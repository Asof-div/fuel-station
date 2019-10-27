<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $user = User::create([

			'name' => 'Abiodun Adeyinka',
			'email' => 'adeyinkab24@gmail.com',
			'password' => bcrypt('secret'),

		]);
    }
}

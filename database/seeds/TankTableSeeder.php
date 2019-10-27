<?php

use Illuminate\Database\Seeder;
use App\Models\Tank;

class TankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('tanks')->truncate();
        DB::table('dispensers')->truncate();
        DB::table('fuels')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $tank1 = Tank::create([
			'name' => 'T1',
			'volume' => 10000,
			'fuel_level' => 0,
		]);

        $tank1->dispensers()->createMany([
        	[
        		'name' => 'D1',
        	],
        	[
        		'name' => 'D2',
        	]
        ]);

        $tank2 = Tank::create([
			'name' => 'T2',
			'volume' => 10000,
			'fuel_level' => 0,
		]);

		$tank2->dispensers()->create([
    		'name' => 'D3',
        ]);
    }
}

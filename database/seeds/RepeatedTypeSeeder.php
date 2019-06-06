<?php

use Illuminate\Database\Seeder;

class RepeatedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repeated_types')->insert([
            [
                'name'=> 'Yearly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Monthly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Weekly',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Daily',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

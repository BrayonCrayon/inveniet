<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendee_types')->insert([
            [
                'name'       => 'host',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'guest',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

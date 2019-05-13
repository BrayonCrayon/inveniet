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
                'name'       => 'Host',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Guest',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

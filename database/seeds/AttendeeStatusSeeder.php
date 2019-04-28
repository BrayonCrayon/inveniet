<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendeeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendee_statuses')->insert([
            [
                'name'       => 'Attending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Not Attending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

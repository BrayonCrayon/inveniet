<?php

use Illuminate\Database\Seeder;
use \App\Attendee;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Attendee::class, 250)->create();
    }
}

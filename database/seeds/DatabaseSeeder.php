<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RepeatedTypeSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(UserRelationshipTypeSeeder::class);
        $this->call(AttendeeTypeSeeder::class);
        $this->call(AttendeeStatusSeeder::class);
        $this->call(AttendeeSeeder::class);
        $this->call(RelationshipStatusSeeder::class);
        $this->call(UserRelationshipSeeder::class);
    }
}

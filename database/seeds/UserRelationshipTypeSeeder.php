<?php

use Illuminate\Database\Seeder;

class UserRelationshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserRelationshipType::class, 10)->create();
    }
}

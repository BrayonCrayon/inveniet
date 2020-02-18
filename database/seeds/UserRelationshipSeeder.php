<?php

use App\Models\UserRelationship;
use Illuminate\Database\Seeder;

class UserRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserRelationship::class, 500)->create();
    }
}

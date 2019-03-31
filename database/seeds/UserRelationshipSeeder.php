<?php

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
        factory(App\UserRelationship::class, 150)->create();
    }
}

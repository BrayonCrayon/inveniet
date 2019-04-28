<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRelationshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_relationship_types')->insert([
            [
                'name'       => 'friend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'best friend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'spouse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'sibling',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'co-worker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'pet',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

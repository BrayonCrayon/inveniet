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
                'name'       => 'Friend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Best Friend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Spouse',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Sibling',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Co-Worker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Pet',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

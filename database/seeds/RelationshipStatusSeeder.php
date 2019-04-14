<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationship_statuses')->insert([
            [
                'name'       => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'declined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}

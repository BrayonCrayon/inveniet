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
                'name'       => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Declined',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Accepted',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}

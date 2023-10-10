<?php

namespace Database\Seeders;

use App\Models\ServicesCompatibility;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServicesCompatibilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServicesCompatibility::query()->insert([
            [
                'service_id' => 1,
                'disabled_service_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'service_id' => 1,
                'disabled_service_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'service_id' => 4,
                'disabled_service_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'service_id' => 4,
                'disabled_service_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'service_id' => 5,
                'disabled_service_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'service_id' => 5,
                'disabled_service_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

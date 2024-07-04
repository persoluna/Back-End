<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserInquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete all existing rows
        // DB::table('user_inquiries')->truncate();

        $faker = Faker::create();

        // Define a list of years and months
        $years = ['2024'];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        foreach ($years as $year) {
            // Determine a random number of inquiries for each year
            $numInquiries = rand(100, 500); // Adjust the range as needed

            for ($i = 0; $i < $numInquiries; $i++) {
                // Pick a random month from the list
                $randomMonth = $months[array_rand($months)];

                // Generate a random day within the chosen month
                $randomDay = rand(1, 28); // Assuming 28 days to avoid invalid dates

                // Create a full timestamp for created_at
                $createdAt = "$year-$randomMonth-$randomDay " . $faker->time('H:i:s');

                // Randomly decide if this is a GPM inquiry
                $isGPM = $faker->boolean(70); // 70% chance of being GPM

                DB::table('user_inquiries')->insert([
                    'name' => $faker->name(),
                    'mobile_number' => $faker->phoneNumber(),
                    'email' => $faker->unique()->safeEmail(),
                    'message' => $faker->paragraph(),
                    'companyName' => $isGPM ? $faker->company() : null,
                    'city' => $isGPM ? $faker->city() : null,
                    'pinCode' => $isGPM ? $faker->postcode() : null,
                    'utm_source' => $isGPM ? $faker->randomElement(['google', 'facebook', 'twitter', 'linkedin']) : null,
                    'utm_medium' => $isGPM ? $faker->randomElement(['cpc', 'social', 'email', 'banner']) : null,
                    'utm_campaign' => $isGPM ? $faker->word() : null,
                    'utm_id' => $isGPM ? $faker->uuid() : null,
                    'gclid' => $isGPM ? $faker->uuid() : null,
                    'gcid_source' => $isGPM ? $faker->randomElement(['google', 'bing', 'yahoo']) : null,
                    'is_GPM' => $isGPM,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            }
        }
    }
}
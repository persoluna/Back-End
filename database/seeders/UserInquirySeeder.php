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
        $faker = Faker::create();

        // Define a list of years and months
        $years = ['2024', '2023', '2022', '2021', '2020', '2019', '2018'];
        $months = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        foreach ($years as $year) {
            // Determine a random number of inquiries for each year
            $numInquiries = rand(10, 90); // Adjust the range as needed

            for ($i = 0; $i < $numInquiries; $i++) {
                // Pick a random month from the list
                $randomMonth = $months[array_rand($months)];

                // Generate a random day within the chosen month
                $randomDay = rand(1, 28); // Assuming 28 days to avoid invalid dates

                // Create a full timestamp for created_at
                $createdAt = "$year-$randomMonth-$randomDay " . $faker->time('H:i:s');

                DB::table('user_inquiries')->insert([
                    'name' => $faker->name(),
                    'mobile_number' => $faker->phoneNumber(),
                    'email' => $faker->unique()->safeEmail(),
                    'message' => $faker->paragraph(),
                    'created_at' => $createdAt,
                    'updated_at' => now(),
                ]);
            }
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $companies = [];

        $companies[] = [
            'name' => "Shila's Bakery",
            'user_id' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $companies[] = [
            'name' => "Shila's Pizza",
            'user_id' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        for ($i = 1; $i <= 5; $i++) {
            $companies[] = [
                'name' => Str::random(5),
                'user_id' => rand(1, 11),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('companies')->insert($companies);
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array which will be used for the insertion
        $users = [

        ];

        // general users
        for ($i = 1; $i <= 5; $i++) {
            $users[] = [
                'name' => Str::random(5),
                'email' => Str::random(5),
                'password' => bcrypt("me"),
                'type' => "general",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        // admins
        $users[] = [
            'name' => "shila",
            'email' => "shilakhan007@hotmail.com",
            'password' => bcrypt("me"),
            'type' => "admin",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // company
        $users[] = [
            'name' => "zillur",
            'email' => "zillur1996@hotmail.com",
            'password' => bcrypt("me"),
            'type' => "company",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        // companies
        for ($i = 1; $i <= 4; $i++) {
            $users[] = [
                'name' => Str::random(5),
                'email' => Str::random(5),
                'password' => bcrypt("me"),
                'type' => "company",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        DB::table('users')->insert($users);
    }
}

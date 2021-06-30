<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class add_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "fname" => "สุเมธ",
                "lname" => "ดวงมาลัย",
                "username" => "sumead007",
                "password" => bcrypt(12345678),
                "address" => "ขอนแก่น",
                "tel" => "0845213574",
            ]
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class add_branch extends Seeder
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
                "name" => "สาขาเซนทรัล",
                "province" => "ขอนแก่น",
                "username" => "sumead008",
                "password" => bcrypt(12345678),
            ]
        ];
        foreach ($users as $key => $value) {
            Branch::create($value);
        }
    }
}

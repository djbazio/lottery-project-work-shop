<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;

class add_customer extends Seeder
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
                "fname" => "นัทวัด",
                "lname" => "ศรีระหว้า",
                "money" => "0.0",
                "username" => "sumead084",
                "password" => bcrypt(12345678),
                "address" => "ขอนแก่น",
                "tel" => "0987543215",
            ]
        ];
        foreach ($users as $key => $value) {
            Customers::create($value);
        }
    }
}

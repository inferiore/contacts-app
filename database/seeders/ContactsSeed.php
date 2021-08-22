<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\Address;
use Faker\Provider\PhoneNumber;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'name' => Str::random(10),
            "birth_date" => Carbon::now()->subYears(25),
            "phone_number" => PhoneNumber::randomLetter(),
            "address" => Address::randomLetter(),
            "credit_card" => Str::random(),
            "franchise" => Str::random(),
            "email" => Str::random()."@gmail.com",
            "user_id" =>1,
            "credit_card_last_numbers"=>5230,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),

        ]);

    }
}

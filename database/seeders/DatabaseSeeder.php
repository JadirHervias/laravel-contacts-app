<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()->times(1)->create([
            "name" => "Jadir Hervias",
            "email" => "jadirhervias@gmail.com",
            "address" => "Av. Proceres 123",
            "phone_number" => "911246644"
        ]);
    }
}

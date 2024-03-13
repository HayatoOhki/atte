<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        User::factory(40)->create();
        $this->call(AttendanceTableSeeder::class);
        $this->call(BreakTimesTableSeeder::class);
    }
}

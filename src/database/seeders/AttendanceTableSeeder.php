<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('attendances')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for($i=1; $i <= 31; $i++) {
            $clock_in = new Carbon("2024-01-{$i} 09:00:00");
            $clock_out = new Carbon("2024-01-{$i} 18:00:00");
            $break_times = new Carbon("2024-01-{$i} 01:00:00");
            $time_worked = new Carbon("2024-01-{$i} 08:00:00");
            for($num=1; $num <= 25; $num++) {
                $params[] = [
                    'user_id' => $num,
                    'date' => $clock_in,
                    'status' => 3,
                    'clock_in' => $clock_in,
                    'clock_out' => $clock_out,
                    'break_times' => $break_times,
                    'time_worked' => $time_worked,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('attendances')->insert($params);
    }
}

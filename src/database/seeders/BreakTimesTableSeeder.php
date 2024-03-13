<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BreakTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('break_times')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $id = 1;
        for($i=1; $i <= 31; $i++) {
            $break_begin = new Carbon("2024-01-{$i} 12:00:00");
            $break_end = new Carbon("2024-01-{$i} 13:00:00");
            for($num=1; $num <= 25; $num++) {
                $params[] = [
                    'attendance_id' => $id,
                    'break_begin' => $break_begin,
                    'break_end' => $break_end,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $id += 1;
            }
        }

        DB::table('break_times')->insert($params);
    }
}

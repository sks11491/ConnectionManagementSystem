<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HobbiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobbies')->insert([
            ['name' => 'Playing Cricket', 'created_at' => Carbon::now()],
            ['name' => 'Listening Music', 'created_at' => Carbon::now()],
            ['name' => 'Reading', 'created_at' => Carbon::now()],
            ['name' => 'Traveling', 'created_at' => Carbon::now()],
        ]);
    }
}

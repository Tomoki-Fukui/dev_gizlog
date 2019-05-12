<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->truncate();
        DB::table('daily_reports')->insert([
        	[
        		'user_id'	=> 1,
        		'title'		=> 'サッカー',
        		'contents'	=> 'サッカーをしました',
        		'reporting_time'  => Carbon::create('2019','3','30'),
        	],
        	[
        		'user_id'	=> 1,
        		'title'		=> '野球',
        		'contents'	=> '野球をしました',
        		'reporting_time'  => Carbon::create('2019','4','20'),
        	],
        	[
        		'user_id'	=> 1,
        		'title'		=> '勉強',
        		'contents'	=> '勉強をしました',
        		'reporting_time'  => Carbon::create('2019','5','1'),
        	]
        ]);
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $developer = [
            [
                'name'              => 'DEV1',
                'level'             => '1',
                'weekly_work_limit' => '45',
            ],
            [
                'name'              => 'DEV2',
                'level'             => '2',
                'weekly_work_limit' => '45',
            ],
            [
                'name'              => 'DEV3',
                'level'             => '3',
                'weekly_work_limit' => '45',
            ],
            [
                'name'              => 'DEV4',
                'level'             => '4',
                'weekly_work_limit' => '45',
            ],
            [
                'name'              => 'DEV5',
                'level'             => '5',
                'weekly_work_limit' => '45',
            ],

        ];

        DB::table('developer')
          ->insert($developer);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $provider = [
            [
                'name'     => 'ProviderOne',
                'endpoint' => 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one',
            ],
            [
                'name'     => 'ProviderTwo',
                'endpoint' => 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-two',
            ],


        ];

        DB::table('provider')
          ->insert($provider);
    }
}

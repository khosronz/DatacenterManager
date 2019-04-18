<?php

use Illuminate\Database\Seeder;

class PhonetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('phonetypes')->insert([
            [
                'title' => 'موبایل',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'منزل',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

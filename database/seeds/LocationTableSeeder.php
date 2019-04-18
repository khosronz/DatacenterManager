<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('locations')->insert([
            [
                'title' => 'مرکز داده بندرعباس',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'city_id' =>  \App\Models\City::where('title','=','بندرعباس')->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'مرکز داده زنجان',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'city_id' =>  \App\Models\City::where('title','=','زنجان')->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'مرکز داده شیراز',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'city_id' =>  \App\Models\City::where('title','=','شيراز')->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'مرکز داده قم',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'city_id' =>  \App\Models\City::where('title','=','قم')->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

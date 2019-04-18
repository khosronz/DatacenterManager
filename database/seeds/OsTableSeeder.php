<?php

use Illuminate\Database\Seeder;

class OsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('os')->insert([
            [
                'title' => 'server 2016',
                'status' => '1',
                'desc' => 'متن باز',
                'ostype_id' => \App\Models\Ostype::where('title','Windows')->first()->id,
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],[
                'title' => 'Ubuntu 18.10',
                'status' => '1',
                'desc' => 'متن باز',
                'ostype_id' => \App\Models\Ostype::where('title','Linux')->first()->id,
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],[
                'title' => 'Centos 7',
                'status' => '1',
                'desc' => 'متن باز',
                'ostype_id' => \App\Models\Ostype::where('title','Linux')->first()->id,
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ConnectionTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('connectiontypes')->insert([
            [
                'title' => 'ssh',
                'status' => '1',
                'standard_port' => '22',
                'user_id' => \App\User::all()->first()->id,
                'desc' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'vnc',
                'status' => '1',
                'standard_port' => '5900',
                'user_id' => \App\User::all()->first()->id,
                'desc' => 'TCP port 5900+N',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'radmin',
                'status' => '1',
                'standard_port' => '4899',
                'user_id' => \App\User::all()->first()->id,
                'desc' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

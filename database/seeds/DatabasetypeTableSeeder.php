<?php

use Illuminate\Database\Seeder;

class DatabasetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('databasetypes')->insert([
            [
                'title' => 'Mysql',
                'standard_port' => '3306',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Mariadb',
                'standard_port' => '5432',
                'desc' => '',
                'user_id' => \App\User::all()->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

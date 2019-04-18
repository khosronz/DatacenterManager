<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class OrganizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nedsa = DB::table('organizations')->insertGetId([
            'title' => 'مخابرات فارس',
            'parent_id' => 1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $man1 = DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 1',
            'parent_id' => $nedsa,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 2',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 3',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 4',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 5',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 6',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('organizations')->insertGetId([
            'title' => 'ناحیه 7',
            'parent_id' => $man1,
            'status' => '1',
            'user_id' => \App\User::all()->first()->id,
            'desc' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

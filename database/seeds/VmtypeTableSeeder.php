<?php

use Illuminate\Database\Seeder;

class VmtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('vmtypes')->insert([
            [
                'title' => 'ESX 6.5',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'ESX 6',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Oracle VM Virtualbox',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'VMware Fusion and Workstation',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Red Hat Virtualization',
                'status' => '1',
                'desc' => '',
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

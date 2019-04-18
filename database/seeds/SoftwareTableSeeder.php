<?php

use Illuminate\Database\Seeder;

class SoftwareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('software')->insert([
            [
                'server_name' => 'Switch L2 N1',
                'status' => '1',
                'os_id' => \App\Models\Os::first()->first()->id,
                'ip' => '192.168.1.100',
                'domain_id' => \App\Models\Domain::first()->id,
                'location_id' => \App\Models\Location::first()->first()->id,
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'server_name' => 'Switch L3 N2',
                'status' => '1',
                'os_id' => \App\Models\Os::first()->first()->id,
                'ip' => '192.168.1.101',
                'domain_id' => \App\Models\Domain::first()->id,
                'location_id' => \App\Models\Location::first()->first()->id,
                'user_id' => \App\User::first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

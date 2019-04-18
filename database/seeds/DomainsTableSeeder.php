<?php

use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('domains')->insert([
            [
                'url' => 'Fava',
                'username' => 'khosronz.com@gmail.com',
                'password' => encrypt('1qaz!QAZ'),
                'user_id' => \App\User::all()->first()->id,
                'os_id' => \App\Models\Os::find('1')->first()->id,
                'desc' => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

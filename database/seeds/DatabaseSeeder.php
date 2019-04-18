<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(OstypesTableSeeder::class);
         $this->call(OsTableSeeder::class);
         $this->call(ConnectionTypeTableSeeder::class);
         $this->call(OrganizationTableSeeder::class);
         $this->call(DomainsTableSeeder::class);
         $this->call(DatabasetypeTableSeeder::class);
         $this->call(PhonetypeTableSeeder::class);
         $this->call(ProvinceTableSeeder::class);
         $this->call(LocationTableSeeder::class);
         $this->call(SoftwareTableSeeder::class);
         $this->call(VmtypeTableSeeder::class);
         $this->call(RoleTableSeeder::class);
    }
}

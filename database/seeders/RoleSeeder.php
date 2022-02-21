<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Super Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Admin'
        ]);
        DB::table('roles')->insert([
            'name' => 'Front Desk'
        ]);
        DB::table('roles')->insert([
            'name' => 'Accounts'
        ]);
        DB::table('roles')->insert([
            'name' => 'Agents'
        ]);

    }
}

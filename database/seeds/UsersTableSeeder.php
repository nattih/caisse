<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('role_user')->delete();
        $admin= User::create([
            'name'=>'admin',
            'prenom'=>'gestionnaire',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('secret')
            ]);
            $adminRole=Role::where('name','admin') ->first();  
            $admin->roles()->attach($adminRole);
    }
}

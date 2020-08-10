<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
    
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $authorRole = Role::where('name', 'author')->first();
     

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
               
        ]);
        
         $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
            
        ]);
        $author = User::create([
            'name' => 'Author',
            'email' => 'author@author.com',
            'password' => Hash::make('password')
            
        ]);
        
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $author->roles()->attach($authorRole);
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* writer role can add blogs and manage their owns only */
        Role::create([
            'name' => 'writer',
        ]);
        /* Moderator role can moderate other's blog as well, can't update user roles */

        /* Admin can manage roles and blogs as well */
        Role::create([
            'name' => 'admin',
        ]);
        /* Member is just registered on webpage who's not able to update or write anything*/
        Role::create([
            'name' => 'member',
        ]);
        /* Create a user with writer role */
        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => Hash::make('writer'),
        ]);
        $writer->assignRole('writer');

        /* Create a user with admin role */
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');

        /* Create User without permissions */
        User::create([
            'name' => 'user',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guest'),
        ]);
    }
}

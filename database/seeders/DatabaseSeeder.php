<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'mobile' => '15879836',
            'password' => Hash::make('123456789'),
        ]);

       $adminRole = Role::create([
            'name' => 'Super Admin'
        ]);

        $pers = ["Users", "RAP", "Customers", "Reservations","Drivers","Cars","Reports"];
       

        foreach($pers as $per) {
          $per1 = Permission::create(['name' => $per .'_Create', 'guard_name' => 'web']);
          $adminRole->givePermissionTo($per1);
          $per2 = Permission::create(['name' => $per .'_Read', 'guard_name' => 'web']);
          $adminRole->givePermissionTo($per2);
          $per3 = Permission::create(['name' => $per .'_Update', 'guard_name' => 'web']);
          $adminRole->givePermissionTo($per3);
          $per4 = Permission::create(['name' => $per .'_Delete', 'guard_name' => 'web']);
          $adminRole->givePermissionTo($per4);
        }

        $user->assignRole($adminRole);

    }
}

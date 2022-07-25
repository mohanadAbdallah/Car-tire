<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),

        ]);
        $adminRole=Role::create(['name'=>'Admin']);
        $adminRole->givePermissionTo([
            'view_company_links',
            'view_car',
            'view_role',
            'delete_role',
            'add_role',
            'view_role',
            'view_customer',
            'view_company',
            'view_shelf',
            'view_orders',
            'view_user',
            'view_tire',
            'edit_user',
            'edit_tire',
            'edit_shelf',
            'edit_role',
            'edit_orders',
            'edit_customer',
            'edit_company_links',
            'edit_car',
            'delete_car',
            'delete_user',
            'delete_tire',
        ]);

        $user->assignRole($adminRole);

    }
}

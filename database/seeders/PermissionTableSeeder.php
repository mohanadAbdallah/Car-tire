<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parents = [
            'role' => ['view', 'add', 'edit', 'delete'],
            'car' => ['view', 'add', 'edit', 'delete'],
            'shelf' => ['view', 'add', 'edit', 'delete'],
            'user' => ['view', 'add', 'edit', 'delete'],
            'customer' => ['control', 'view', 'add', 'edit', 'delete'],
            'tire' => ['control', 'view', 'add', 'edit', 'delete'],
            'company' => ['control', 'view', 'add', 'edit', 'delete'],
            'company_links' => ['control', 'view', 'add', 'edit', 'delete'],
            'settings' => ['control'],
            'orders' => ['view', 'add', 'edit', 'delete', 'status'],
            'reports' => ['control', 'view', 'print', 'export'],
            'notifications' => ['control'],
            'dashboard' => ['control'],
            'slider' => ['control'],
            'telescope' => ['control'],
            'dataApp' => ['control'],

        ];


        foreach ($parents as $parent => $types) {
            foreach ($types as $type) {
                $permission  =Permission::create(['name_key' => $this->transType($type), 'name' => "$type" . "_" . $parent, 'parent' => $parent]);

            }
        }
    }

    public function transType($type)
    {
        switch ($type) {
            case 'view' :
                return 'view';
            case 'add' :
                return 'add';
            case 'edit' :
                return 'edit';
            case 'delete' :
                return 'delete';
            case 'control' :
                return 'control';
            case 'status' :
                return 'status';


        }

    }
}

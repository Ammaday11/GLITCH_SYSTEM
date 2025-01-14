<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        foreach($this->roles as $role) {
            $role = Role::firstOrCreate(['name' => trim($role)]);

            if($role->name == 'Administrator') {
                // assign all permissions for the administrator
                $role->syncPermissions(Permission::whereNotIn('name', ['delete_glitch'])->get());
                $this->command->info('Administrator granted all the permissions');
            }

            if($role->name == 'Manager') {
                $role->syncPermissions(Permission::whereNotIn('name', ['view_users', 'manage_users', 'view_roles', 'manage_roles'])->get());
            }

            if( $role->name == 'Staff' ) {
                $role->syncPermissions([
                    'view_reports',
                    'create_glitch',
                    'modify_glitch',
                    'view_glitch',
                ]);
            }

            
        }
        foreach($this->user_roles as $user_role) {
            $user = User::where('bwlmNo', $user_role['bwlmNo'])->first();
            if($user) {
                $user->assignRole($user_role['roles']);
            }
        }

    }






    protected $roles = [
        'Administrator',
        'Manager',
        'Staff',
    ];

    protected $permissions = [
        'view_users',
        'manage_users',
        'view_roles',
        'manage_roles',
        'view_reports',
        'create_glitch',
        'modify_glitch',
        'suspend_glitch',
        'view_glitch',
        'delete_glitch'
    ];

    protected $user_roles = [
        [
            'bwlmNo' => 'BWLM0156',
            'roles' => [
                'Administrator',
                'Manager',
                'Staff'
            ]
        ],
        [
            'bwlmNo' => 'BWLM0155',
            'roles' => [
                'Staff'
            ]
        ]
    ];

}

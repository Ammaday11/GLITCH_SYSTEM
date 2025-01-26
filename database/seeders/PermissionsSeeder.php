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
                $role->syncPermissions(Permission::all());
                $this->command->info('Administrator granted all the permissions');
            }

            if($role->name == 'Manager') {
                $role->syncPermissions(Permission::whereNotIn('name', ['view_users', 'manage_users', 'view_roles', 'manage_roles','manage_glitch_types'])->get());
            }

            if( $role->name == 'Staff' ) {
                $role->syncPermissions([
                    'view_reports',
                    'create_glitch',
                    'modify_glitch',
                    'view_glitch',
                    'view_glitch_list',
                    'update_guestlist',
                    'change_password',
                    'create_glitch_types',
                    'create_guest_satisfactions'
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
        'change_password',
        'view_roles',
        'manage_roles',
        'update_guestlist',
        'view_reports',
        'create_glitch',
        'modify_glitch',
        'suspend_glitch',
        'view_glitch',
        'view_glitch_list',
        'delete_glitch',
        'manage_staff',
        'manage_glitch_types',
        'create_glitch_types',
        'manage_guest_satisfactions',
        'create_guest_satisfactions'
    ];

    protected $user_roles = [
        [
            'bwlmNo' => 'BWLM0156',
            'roles' => [
                'Administrator'
            ]
        ],
        [
            'bwlmNo' => 'BWLM0155',
            'roles' => [
                'Manager'
            ]
        ]
    ];

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'teacher', 'student', 'parent'];
        foreach ($roles as $role){
            Role::firstOrCreate(['name' => $role]);
        }

        $permissions = [
            'view dashboard',
            'manage users',
            'view reports',
            'manage content',
            'input achivement',
            'input violation',
            'view achivement',
            'view violation',
        ];

        foreach ($permissions as $permission){
           Permission::firstOrCreate(['name'=> $permission]);
        }

        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo(Permission::all());
        $teacherRole = Role::findByName('teacher');
        $teacherRole->givePermissionTo(['view dashboard', 'view reports', 'manage content', 'input achivement', 'input violation', 'view achivement', 'view violation']);
        $studentRole = Role::findByName('student');
        $studentRole->givePermissionTo(['view dashboard', 'view reports', 'view achivement', 'view violation']);
        $parentRole = Role::findByName('parent');
        $parentRole->givePermissionTo(['view dashboard', 'view reports']);
    }
}

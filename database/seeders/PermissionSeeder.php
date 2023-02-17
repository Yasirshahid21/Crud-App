<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'course.view',
            'course.create',
            'course.edit',
            'course.delete'
         ];
        // $permissions = Permission::all();
         foreach ($permissions as $permission) {
              $permission = Permission::create(['name' => $permission, 'module' => 'course']);
            //   $permission->assignRole('admin');
         }
        // $permission = Permission::create(['name' => 'view', 'guard_name' => 'web', 'module' => 'teacher']);
    }
}

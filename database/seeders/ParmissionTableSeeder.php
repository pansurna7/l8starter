<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class ParmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $authorities=config('permission.authorities');
      $listParmission=[];
      $superAdminParmission=[];
      $AdminParmission=[];
      $staffParmission=[];
        foreach ($authorities as $label => $permissions) {
          foreach($permissions as $permission){
            $listParmission[]=[
              'name'=>$permission,
              'guard_name'=>'admin',
              'created_at'=>date('Y-m-d H:i:s'),
              'updated_at'=>date('Y-m-d H:i:s')
            ];
            $superAdminParmission[]=$permission;
            if (in_array($label,['manage_posts','manage_categories','manage_tags'])) {
              $AdminParmission[]=$permission;
            }
            if (in_array($label,['manage_posts'])) {
              $staffParmission[]=$permission;
            }
          }
            
        }
        // insert parmission
        Permission::insert( $listParmission);
        // insert role
        // super Admin
        $superAdmin=Role::create([
          'name'=>'SuperAdmin',
          'guard_name'=>'admin',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')            
        ]);
        $admin=Role::create([
          'name'=>'Admin',
          'guard_name'=>'admin',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')            
        ]);
        $staff=Role::create([
          'name'=>'Staff',
          'guard_name'=>'admin',
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>date('Y-m-d H:i:s')            
        ]);
        $superAdmin->givePermissionTo($superAdminParmission);
        $admin->givePermissionTo($AdminParmission);
        $staff->givePermissionTo($staffParmission);
        $userSuperAdmin=Admin::find('1')->assignRole('SuperAdmin');
    }
}

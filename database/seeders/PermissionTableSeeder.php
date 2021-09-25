<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $permissions = [
            // Roles
            'role-list'             => 'عرض الادوار',
            'role-create'           => 'إضافة دور',
            'role-edit'             => 'تعديل دور',
            'role-delete'           => 'حذف دور',
            // Admins
            'admin-list'             => 'عرض المشرفين',
            'admin-create'           => 'إضافة مشرف',
            'admin-edit'             => 'تعديل مشرف',
            'admin-delete'           => 'حذف مشرف',

            // Jobs
            'job-list'             => 'عرض الوظائف',
            'job-create'           => 'إضافة وظيفة',
            'job-edit'             => 'تعديل وظيفة',
            'job-delete'           => 'حذف وظيفة',
            
            // nationalities
            'nationality-list'             => 'عرض الجنسيات',
            'nationality-create'           => 'إضافة الجنسية',
            'nationality-edit'             => 'تعديل الجنسية',
            'nationality-delete'           => 'حذف الجنسية',
            
            // Cities
            'city-list'             => 'عرض المحافظات',
            'city-create'           => 'إضافة محافظة',
            'city-edit'             => 'تعديل محافظة',
            'city-delete'           => 'حذف محافظة',

            // Users
            'user-list'             => 'عرض المتقدمين',
            'user-export'           => 'تصدير بيانات المتقدمين',
            'user-update-status'    => 'تعديل حالة المتقدم',
            'user-import'           => 'استيراد بيانات المتقدمين',
            
            // settings
            'settings'             => 'الاعدادات',

        ];

        DB::table('permissions')->delete();
        foreach ($permissions as $key => $permission) {
            Permission::create([
                'name' => $key,
                'display_name' => $permission,
            ]);
        }
    }
}

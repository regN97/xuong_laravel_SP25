<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các quyền
        $permissions = [
            ['name' => 'manage_users',        'description' => 'Quản lý người dùng'],
            ['name' => 'manage_products',     'description' => 'Quản lý sản phẩm'],
            ['name' => 'manage_orders',       'description' => 'Quản lý đơn hàng'],
            ['name' => 'view_reports',        'description' => 'Xem báo cáo doanh thu'],
            ['name' => 'manage_categories',   'description' => 'Quản lý danh mục'],
            ['name' => 'view_products',       'description' => 'Xem sản phẩm'],
            ['name' => 'place_order',         'description' => 'Đặt hàng'],
        ];

        foreach ($permissions as $item) {
            Permission::firstOrCreate(['name' => $item['name']], $item);
        }

        // Tạo các vai trò
        $roles = [
            'admin' => 'Quản trị viên toàn hệ thống',
            'staff' => 'Nhân viên xử lý đơn hàng & sản phẩm',
            'customer' => 'Khách hàng đặt mua sản phẩm',
        ];

        foreach ($roles as $name => $desc) {
            Role::firstOrCreate(['name' => $name], [
                'name' => $name,
                'description' => $desc,
            ]);
        }

        // Gán quyền cho từng vai trò
        $admin = Role::where('name', 'admin')->first();
        $staff = Role::where('name', 'staff')->first();
        $customer = Role::where('name', 'customer')->first();

        $admin->permissions()->sync(Permission::pluck('id')->toArray());

        $staff->permissions()->sync([
            Permission::where('name', 'manage_products')->first()->id,
            Permission::where('name', 'manage_orders')->first()->id,
            Permission::where('name', 'view_reports')->first()->id,
            Permission::where('name', 'manage_categories')->first()->id,
        ]);

        $customer->permissions()->sync([
            Permission::where('name', 'view_products')->first()->id,
            Permission::where('name', 'place_order')->first()->id,
        ]);
    }
}

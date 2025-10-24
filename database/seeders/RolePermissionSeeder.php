<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage pengguna',
            'manage reqruitment',
            'manage riwayat_pendaftaran',
            'manage forum',
            'manage ukm',
            'manage ormawa',
            'data_pendaftar',
        ];

        // Create or find permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        // Create or find roles and assign permissions
        $userRole = Role::firstOrCreate(['name' => 'user']);
        $userPermissions = ['manage riwayat_pendaftaran'];
        $userRole->syncPermissions($userPermissions);

        $AdminukmRole = Role::firstOrCreate(['name' => 'Adminukm']);
        $AdminukmPermissions = ['manage ukm','data_pendaftar', 'manage reqruitment'];
        $AdminukmRole->syncPermissions($AdminukmPermissions);

        $AdminOrmawa = Role::firstOrCreate(['name' => 'AdminOrmawa']);
        $AdminOrmawaPermissions = ['manage ormawa','data_pendaftar', 'manage reqruitment'];
        $AdminOrmawa->syncPermissions($AdminOrmawaPermissions);

        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminPermissions = ['manage pengguna', 'manage forum'];
        $superAdminRole->syncPermissions($superAdminPermissions);

        // Create a super admin user and assign the super admin role
        $user = User::firstOrCreate([
            'email' => 'super@admin.com'
        ], [
            'name' => 'Super Admin',
            // 'avatar' => 'images/logo.png',
            'password' => Hash::make('1234567890'),
        
        ]);

        $user->assignRole($superAdminRole);
    }
}


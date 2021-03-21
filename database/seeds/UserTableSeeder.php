<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123qweasd')
        ]);

        $role = Role::find(1);
        $permission = Permission::all();

        // assign ke permission
        $role->syncPermissions($permission);

        $user = User::find(1);
        $user->assignRole($role->name);

        $users = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('123qweasd')
        ]);

        $role = Role::find(2);
        $permission = Permission::find([1, 2, 3, 4, 5, 6, 8]);

        // assign ke permission
        $role->syncPermissions($permission);

        $user = User::find(2);
        $user->assignRole($role->name);
    }
}

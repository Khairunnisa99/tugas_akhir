<?php

use Illuminate\Database\Seeder;
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
        Permission::create(['name' => 'programkerja.index']);

        Permission::create(['name' => 'akreditasi.index']);

        Permission::create(['name' => 'struktur.index']);

        Permission::create(['name' => 'dataproker.index']);

        Permission::create(['name' => 'dokumen.index']);

        Permission::create(['name' => 'rapat.index']);

        Permission::create(['name' => 'users.index']);

        Permission::create(['name' => 'klinik.index']);
    }
}

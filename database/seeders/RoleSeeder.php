<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Secretaria']);
        $role3 = Role::create(['name' => 'Docente']);
        $role4 = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'admin.estudiantes.index'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.estudiantes.create'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.estudiantes.edit'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.estudiantes.destroy'])->assignRole($role1)->assignRole($role2);

        Permission::create(['name' => 'admin.docentes.index'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.docentes.create'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.docentes.edit'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.docentes.destroy'])->assignRole($role1)->assignRole($role2);

        Permission::create(['name' => 'admin.aulas.index'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.aulas.create'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.aulas.edit'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.aulas.destroy'])->assignRole($role1)->assignRole($role2);

        Permission::create(['name' => 'admin.cursos.index'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.cursos.create'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.cursos.edit'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.cursos.destroy'])->assignRole($role1)->assignRole($role2);

        Permission::create(['name' => 'admin.horarios.index'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.horarios.create'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.horarios.edit'])->assignRole($role1)->assignRole($role2);
        Permission::create(['name' => 'admin.horarios.destroy'])->assignRole($role1)->assignRole($role2);
    }
}

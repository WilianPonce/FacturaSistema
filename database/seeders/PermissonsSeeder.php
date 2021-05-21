<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administración
            //Empresa
            Permission::create(["name"=>"empresas.listar"]);
            Permission::create(["name"=>"empresas.ver"]);
            Permission::create(["name"=>"empresas.crear"]);
            Permission::create(["name"=>"empresas.editar"]);
            Permission::create(["name"=>"empresas.eliminar"]);

            //Establecimientos
            Permission::create(["name"=>"establecimientos.listar"]);
            Permission::create(["name"=>"establecimientos.ver"]);
            Permission::create(["name"=>"establecimientos.crear"]);
            Permission::create(["name"=>"establecimientos.editar"]);
            Permission::create(["name"=>"establecimientos.eliminar"]);

            //Puntos_emision
            Permission::create(["name"=>"puntos_emision.listar"]);
            Permission::create(["name"=>"puntos_emision.ver"]);
            Permission::create(["name"=>"puntos_emision.crear"]);
            Permission::create(["name"=>"puntos_emision.editar"]);
            Permission::create(["name"=>"puntos_emision.eliminar"]);

            //Usuarios
            Permission::create(["name"=>"usuarios.listar"]);
            Permission::create(["name"=>"usuarios.ver"]);
            Permission::create(["name"=>"usuarios.crear"]);
            Permission::create(["name"=>"usuarios.editar"]);
            Permission::create(["name"=>"usuarios.eliminar"]);

            //Impuestos
            Permission::create(["name"=>"roles.listar"]);
            Permission::create(["name"=>"roles.ver"]);
            Permission::create(["name"=>"roles.crear"]);
            Permission::create(["name"=>"roles.editar"]);
            Permission::create(["name"=>"roles.eliminar"]);

        foreach(range(1, 25) as $cont){
            Role::first()->givePermissionTo(intval($cont));
        }
        foreach(range(1, 25, 5) as $cont){
            Role::find(2)->givePermissionTo(intval($cont));
        }
        foreach(range(2, 25, 5) as $cont){
            Role::find(2)->givePermissionTo(intval($cont));
        }
    }
}

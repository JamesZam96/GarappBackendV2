<?php
namespace Database\Seeders;

use App\Models\PermissionsModel;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class RoleSeeder
 *
 * Seeder para poblar la base de datos con roles, permisos y un usuario administrador por defecto.
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Este método ejecuta el seeder para crear roles, permisos y un usuario administrador.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Crear permisos si la tabla 'permissions' está vacía.
         */
        if (!PermissionsModel::count()) {
            $permissions = [
                'control_total' => 'Control total',
                'borrar' => 'Borrar recursos',
                'editar' => 'Editar recursos',
                'actualizar' => 'Actualizar recursos',
                'ver' => 'Ver recursos',
                'crear' => 'Crear recursos',
                'ver_productos' => 'Ver productos',
                'ver_categorias' => 'Ver categorías',
                'ver_servicios' => 'Ver servicios',
                'ver_taller' => 'Ver taller',
                'ver_almacenes' => 'Ver almacenes',
                'aceptar_orden' => 'Aceptar orden',
                'cancelar_orden' => 'Cancelar orden',
                'ver_vehiculos' => 'Ver vehículos',
            ];

            foreach ($permissions as $name => $description) {
                PermissionsModel::create(['name' => $name, 'description' => $description]);
            }
        }

        /**
         * Crear roles si la tabla 'roles' está vacía.
         */
        if (!RoleModel::count()) {
            $adminRole = RoleModel::create(['name' => 'administrador', 'description' => 'Control total sobre todos los recursos']);
            $customerRole = RoleModel::create(['name' => 'cliente', 'description' => 'Permisos limitados para clientes']);
            $warehouseRole = RoleModel::create(['name' => 'almacen', 'description' => 'Permisos para el personal de almacén']);
            $workshopRole = RoleModel::create(['name' => 'taller', 'description' => 'Permisos para el personal del taller']);
            $deliveryRole = RoleModel::create(['name' => 'repartidor', 'description' => 'Permisos para repartidores']);
            $visitorRole = RoleModel::create(['name' => 'visitante', 'description' => 'Permisos limitados para visitantes']);

            // Asignar permisos a roles
            $adminPermissions = PermissionsModel::whereIn('name', [
                'control_total', 'borrar', 'editar', 'actualizar', 'ver', 'crear'
            ])->pluck('id');
            $adminRole->permissions()->attach($adminPermissions);

            $customerPermissions = PermissionsModel::whereIn('name', [
                'borrar', 'editar', 'actualizar', 'ver', 'crear', 'ver_productos', 'ver_categorias', 'ver_servicios', 'ver_taller', 'ver_almacenes'
            ])->pluck('id');
            $customerRole->permissions()->attach($customerPermissions);

            $warehousePermissions = PermissionsModel::whereIn('name', [
                'borrar', 'editar', 'actualizar', 'ver', 'crear', 'ver_productos', 'ver_categorias', 'ver_vehiculos'
            ])->pluck('id');
            $warehouseRole->permissions()->attach($warehousePermissions);

            $workshopPermissions = PermissionsModel::whereIn('name', [
                'borrar', 'editar', 'actualizar', 'ver', 'crear', 'ver_servicios', 'ver_categorias'
            ])->pluck('id');
            $workshopRole->permissions()->attach($workshopPermissions);

            $deliveryPermissions = PermissionsModel::whereIn('name', [
                'aceptar_orden', 'cancelar_orden', 'ver_vehiculos'
            ])->pluck('id');
            $deliveryRole->permissions()->attach($deliveryPermissions);

            $visitorPermissions = PermissionsModel::whereIn('name', [
                'ver_productos', 'ver_categorias', 'ver_servicios'
            ])->pluck('id');
            $visitorRole->permissions()->attach($visitorPermissions);
        }

        /**
         * Crear un usuario administrador por defecto si la tabla 'users' está vacía.
         */
        if (!User::count()) {
            $data = [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin')
            ];
            $admin = User::create($data);

            $adminRole = RoleModel::where('name', 'administrador')->first();
            $admin->roles()->attach($adminRole->id);
        }
    }
}

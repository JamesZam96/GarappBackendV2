<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleModel
 *
 * Este modelo representa la tabla 'roles' en la base de datos.
 * Utiliza el trait HasFactory para facilitar la creación de instancias del modelo.
 */
class RoleModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define una relación de muchos a muchos con el modelo PermissionsModel.
     * Un rol puede tener múltiples permisos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(PermissionsModel::class, 'roles_permissions', 'role_id', 'permission_id');
    }

    /**
     * Define una relación de muchos a muchos con el modelo User.
     * Un rol puede estar asignado a múltiples usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_users', 'role_id', 'user_id');
    }

    /**
     * Define una relación de muchos a muchos con el modelo CustomerModel.
     * Un rol puede estar asignado a múltiples clientes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany(CustomerModel::class, 'roles_customers', 'role_id', 'customer_id');
    }

    /**
     * Define una relación de muchos a muchos con el modelo DeliveryModel.
     * Un rol puede estar asignado a múltiples repartidores.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function deliveries()
    {
        return $this->belongsToMany(DeliveryModel::class, 'roles_deliveries', 'role_id', 'delivery_id');
    }

    /**
     * Define una relación de muchos a muchos con el modelo WarehouseModel.
     * Un rol puede estar asignado a múltiples almacenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function warehouses()
    {
        return $this->belongsToMany(WarehouseModel::class, 'roles_warehouses', 'role_id', 'warehouse_id');
    }

    /**
     * Define una relación de muchos a muchos con el modelo WorkshopsModel.
     * Un rol puede estar asignado a múltiples talleres.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workshops()
    {
        return $this->belongsToMany(WorkshopsModel::class, 'roles_workshops', 'role_id', 'workshop_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Rules\Role;

/**
 * Class WarehouseModel
 *
 * Este modelo representa la tabla 'companies' en la base de datos.
 * Define las relaciones con otros modelos y usa el trait HasFactory.
 */
class WarehouseModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define una relación uno a muchos con el modelo ProductModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'warehouse_id');
    }

    /**
     * Define una relación de pertenencia con el modelo RoleModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsToMany(RoleModel::class, 'roles_warehouses', 'role_id', 'warehouse_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionsModel
 *
 * Modelo que representa los permisos en la base de datos.
 */
class PermissionsModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'permissions';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación muchos a muchos con el modelo RoleModel.
     *
     * Un permiso puede estar asociado con múltiples roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(RoleModel::class, 'roles_permissions', 'permission_id', 'role_id');
    }
}

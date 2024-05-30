<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Rules\Role;

/**
 *Class WorkshopsModel
 *
 *Este modelo representa la tabla 'workshops' en la base de datos.
 *Define las relaciones con otros modelos y usa el trait HasFactory.
 */
class WorkshopsModel extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'workshops';

    /**
     * Los atributos que no son asignables masivamente.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define una relación uno a muchos con el modelo ServiceModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(ServiceModel::class, 'workshop_id'); // Corregido el nombre de la columna
    }

    /**
     * Define una relación de pertenencia con el modelo RoleModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsToMany(RoleModel::class, 'roles_workshops', 'role_id', 'workshop_id');
    }
}

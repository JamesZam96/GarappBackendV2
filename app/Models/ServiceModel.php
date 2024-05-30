<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceModel
 *
 * Modelo que representa los servicios en la base de datos.
 */
class ServiceModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'services';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected  $guarded = [];

    /**
     * Relación muchos a muchos con el modelo OrderModel.
     *
     * Un servicio puede estar asociado con múltiples órdenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(OrderModel::class, 'order_service', 'service_id', 'order_id');
    }

    /**
     * Relación muchos a muchos con el modelo WorkshopsModel.
     *
     * Un servicio puede estar asociado con múltiples talleres.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function workshops()
    {
        return $this->belongsToMany(WorkshopsModel::class, 'workshops_id');
    }
}

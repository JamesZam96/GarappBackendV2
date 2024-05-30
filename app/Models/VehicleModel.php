<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VehicleModel
 *
 * Modelo que representa los vehículos en la base de datos.
 */
class VehicleModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'vehicle';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación de pertenencia con el modelo DeliveryModel.
     *
     * Un vehículo pertenece a una entrega.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delivery()
    {
        return $this->belongsTo(DeliveryModel::class, 'delivery_id');
    }
}

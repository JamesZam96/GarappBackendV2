<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PeopleModel
 *
 * Modelo que representa las personas en la base de datos.
 */
class PeopleModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'people';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación uno a uno con el modelo CustomerModel.
     *
     * Una persona puede ser un cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customers()
    {
        return $this->hasOne(CustomerModel::class, 'people_id');
    }

    /**
     * Relación uno a muchos con el modelo DeliveryModel.
     *
     * Una persona puede realizar múltiples entregas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries()
    {
        return $this->hasMany(DeliveryModel::class, 'people_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillModel
 *
 * Modelo que representa las facturas en la base de datos.
 */
class BillModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'bills';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación con el modelo CustomerModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }

    /**
     * Relación con el modelo OrderModel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id');
    }
}

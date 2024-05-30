<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderModel
 *
 * Modelo que representa los pedidos en la base de datos.
 */
class OrderModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'orders';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación de pertenencia con el modelo CustomerModel.
     *
     * Un pedido pertenece a un cliente.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }

    /**
     * Relación muchos a muchos con el modelo ProductModel.
     *
     * Un pedido puede tener muchos productos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'order_product', 'order_id', 'product_id');
    }

    /**
     * Relación muchos a muchos con el modelo ServiceModel.
     *
     * Un pedido puede tener muchos servicios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(ServiceModel::class, 'order_service', 'order_id', 'service_id');
    }

    /**
     * Relación uno a muchos con el modelo BillModel.
     *
     * Un pedido puede tener muchas facturas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->hasMany(BillModel::class, 'order_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductModel
 *
 * Modelo que representa los productos en la base de datos.
 */
class ProductModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'products';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Relación de pertenencia con el modelo WarehouseModel.
     *
     * Un producto pertenece a un almacén.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function warehouse()
    {
        return $this->belongsTo(WarehouseModel::class, 'warehouse_id');
    }

    /**
     * Relación muchos a muchos con el modelo CategoryModel.
     *
     * Un producto puede estar asociado con múltiples categorías.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(CategoryModel::class, 'category_product', 'product_id', 'category_id');
    }

    /**
     * Relación muchos a muchos con el modelo OrderModel.
     *
     * Un producto puede estar asociado con múltiples órdenes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(OrderModel::class, 'order_product', 'product_id', 'order_id');
    }
}

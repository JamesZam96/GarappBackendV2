<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthModel
 *
 * Modelo que representa la tabla de usuarios para la autenticación.
 */
class AuthModel extends Model
{
    use HasFactory;

    /**
     * @var string La tabla asociada al modelo.
     */
    protected $table = 'users';

    /**
     * @var array Los atributos que no son asignables en masa.
     */
    protected $guarded = [];

    /**
     * Método auth
     *
     * Método de autenticación, actualmente no implementado.
     */
    public function auth()
    {
        // Lógica de autenticación no implementada
    }
}

<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

/**
 * Clase de servicio genérico para realizar operaciones CRUD (crear, leer, actualizar, eliminar) en cualquier modelo de Eloquent en Laravel.
 *
 * Esta clase proporciona métodos que encapsulan la lógica común para interactuar con modelos de Eloquent en la base de datos,
 * lo que permite un manejo genérico y reutilizable de estas operaciones en diferentes contextos de la aplicación.
 *
 * @category Servicios
 * @package  App\Http\Services
 */
class DataServices {
    /**
     * El modelo asociado con este servicio.
     *
     * @var Model
     */
    protected $model;

    /**
     * Constructor del servicio.
     *
     * @param Model $model El modelo asociado con este servicio.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    /**
     * Obtener todos los registros del modelo.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->model->orderBy('id', 'desc')->paginate();
    }

    /**
     * Obtener un registro por su ID.
     *
     * @param int $id El ID del registro a obtener.
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Crear un nuevo registro.
     *
     * @param array $data Los datos para crear el registro.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Actualizar un registro existente.
     *
     * @param int $id El ID del registro a actualizar.
     * @param array $data Los datos para actualizar el registro.
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function update($id, array $data)
    {
        $record = $this->getById($id);
        if (!$record) {
            return null;
        }
        $record->update($data);
        return $record;
    }

    /**
     * Eliminar un registro existente.
     *
     * @param int $id El ID del registro a eliminar.
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function delete($id)
    {
        $record = $this->getById($id);
        if (!$record) {
            return null;
        }
        $record->delete();
        return $record;
    }
}

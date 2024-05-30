<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\WarehouseModel;
use Illuminate\Http\Request;

/**
 * Class WarehouseController
 *
 * Este controlador maneja las operaciones CRUD para el modelo Warehouse.
 * Utiliza un servicio de datos para realizar operaciones en la base de datos.
 */
class WarehouseController extends Controller
{ 
    /**
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Constructor de WarehouseController.
     *
     * Inicializa el servicio de datos con el modelo WarehouseModel.
     */
    public function __construct()
    {
        // Inicializar el servicio de datos con el modelo WarehouseModel
        $this->dataServices = new DataServices(new WarehouseModel());
    }

    /**
     * Método para mostrar una lista de todos los almacenes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todos los almacenes utilizando el servicio de datos
        $warehouses = $this->dataServices->getAll();
        // Devuelve la vista 'warehouse.index' con los almacenes recuperados
        return view('warehouse.index', compact('warehouses'));
    }

    /**
     * Método para mostrar el formulario de creación de un nuevo almacén.
     *
     * @return \Illuminate\View\View
     */
    // public function create()
    // {
    //     // Devuelve la vista 'warehouse.create' para crear un nuevo almacén
    //     return view('warehouse.create');
    // }

    /**
     * Método para almacenar un nuevo almacén en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($request->isMethod('get')){
            return view('warehouse.create');
        }
        // Valida los datos de la solicitud y crea un nuevo almacén
        $this->dataServices->create($request->all());
        // Redirige al usuario a la ruta 'warehouse.index' después de almacenar el almacén
        return redirect()->route('warehouse.index');
    }

    /**
     * Método para mostrar los detalles de un almacén específico.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Encuentra el almacén por su ID y lo pasa a la vista 'warehouse.show'
        $warehouse = $this->dataServices->getById($id);
        return view('warehouse.show', compact('warehouse'));
    }

    /**
     * Método para mostrar el formulario de edición de un almacén.
     *
     * @param WarehouseModel $warehouse
     * @return \Illuminate\View\View
     */
    public function edit(WarehouseModel $warehouse)
    {
        // Pasa el almacén a la vista 'warehouse.edit' para su edición
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Método para actualizar los datos de un almacén en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Valida los datos de la solicitud y actualiza el almacén
        $warehouse = $this->dataServices->update($id, $request->all());
        if (!$warehouse) {
            // Si el almacén no se encuentra, lanza un error 404
            abort(404, 'Warehouse not found');
        }
        // Redirige al usuario a la ruta 'warehouse.index' después de actualizar el almacén
        return redirect()->route('warehouse.index');
    }

    /**
     * Método para eliminar un almacén de la base de datos.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Encuentra el almacén por su ID y lo elimina
        $warehouse = $this->dataServices->delete($id);
        if (!$warehouse) {
            // Si el almacén no existe, lanza un error 404
            abort(404, 'Warehouse not found');
        }
        // Redirige al usuario a la ruta 'warehouse.index' después de eliminar el almacén
        return redirect()->route('warehouse.index');
    }
}

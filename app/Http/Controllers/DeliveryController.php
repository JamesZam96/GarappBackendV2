<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\DeliveryModel;
use Illuminate\Http\Request;

/**
 * Class DeliveryController
 *
 * Este controlador maneja las operaciones CRUD para el modelo Delivery.
 * Utiliza un servicio de datos para realizar operaciones en la base de datos.
 */
class DeliveryController extends Controller
{
    /**
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Constructor de DeliveryController.
     *
     * Inicializa el servicio de datos con el modelo DeliveryModel.
     */
    public function __construct()
    {
        // Inicializar el servicio de datos con el modelo DeliveryModel
        $this->dataServices = new DataServices(new DeliveryModel());
    }

    /**
     * Método para mostrar una lista de todas las entregas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Recupera todas las entregas utilizando el servicio de datos
        $deliveries = $this->dataServices->getAll();
        // Devuelve la vista 'delivery.index' con las entregas recuperadas
        return view('delivery.index', compact('deliveries'));
    }

    /**
     * Método para mostrar el formulario de creación de una nueva entrega.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Devuelve la vista 'delivery.create' para crear una nueva entrega
        return view('delivery.create');
    }

    /**
     * Método para almacenar una nueva entrega en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Valida los datos de la solicitud y crea una nueva entrega
        $this->dataServices->create($request->all());
        // Redirige al usuario a la ruta 'deliveries.index' después de almacenar la entrega
        return redirect()->route('deliveries.index');
    }

    /**
     * Método para mostrar los detalles de una entrega específica.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Encuentra la entrega por su ID y la pasa a la vista 'delivery.show'
        $delivery = $this->dataServices->getById($id);
        return view('delivery.show', compact('delivery'));
    }

    /**
     * Método para mostrar el formulario de edición de una entrega.
     *
     * @param DeliveryModel $delivery
     * @return \Illuminate\View\View
     */
    public function edit(DeliveryModel $delivery)
    {
        // Pasa la entrega a la vista 'delivery.edit' para su edición
        return view('delivery.edit', compact('delivery'));
    }

    /**
     * Método para actualizar los datos de una entrega en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Valida los datos de la solicitud y actualiza la entrega
        $delivery = $this->dataServices->update($id, $request->all());
        if (!$delivery) {
            // Si la entrega no se encuentra, lanza un error 404
            abort(404, 'Delivery not found');
        }
        // Redirige al usuario a la ruta 'deliveries.index' después de actualizar la entrega
        return redirect()->route('deliveries.index');
    }

    /**
     * Método para eliminar una entrega de la base de datos.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Encuentra la entrega por su ID y la elimina
        $delivery = $this->dataServices->delete($id);
        if (!$delivery) {
            // Si la entrega no existe, lanza un error 404
            abort(404, 'Delivery not found');
        }
        // Redirige al usuario a la ruta 'deliveries.index' después de eliminar la entrega
        return redirect()->route('deliveries.index');
    }
}

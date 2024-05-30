<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Order.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Order.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new OrderModel());
    }

    /**
     * Muestra una lista de órdenes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->dataServices->getAll();
        return view('order.index', compact('orders'));
    }

    /**
     * Muestra el formulario para crear una nueva orden.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Almacena una nueva orden en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $order = $this->dataServices->create($request->all());
        return redirect()->route('order.index');
    }

    /**
     * Muestra los detalles de una orden específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $order = $this->dataServices->getById($id);
        return view('order.show', compact('order'));
    }

    /**
     * Muestra el formulario para editar una orden específica.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function edit(OrderModel $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Actualiza los datos de una orden en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $order = $this->dataServices->update($id, $request->all());
        if (!$order) {
            abort(404, 'Order not found');
        }
        return redirect()->route('order.index');
    }

    /**
     * Elimina una orden de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $order = $this->dataServices->delete($id);
        if (!$order) {
            abort(404, 'Order not found');
        }
        return redirect()->route('order.index');
    }
}

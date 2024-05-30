<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\CustomerModel;
use App\Models\PeopleModel;
use Illuminate\Http\Request;

/**
 * Class CustomerController
 *
 * Este controlador maneja las operaciones CRUD para el modelo Customer.
 * Utiliza un servicio de datos para realizar operaciones en la base de datos.
 */
class CustomerController extends Controller
{
    /**
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Constructor de CustomerController.
     *
     * Inicializa el servicio de datos con el modelo CustomerModel.
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new CustomerModel());
    }

    /**
     * Método para mostrar una lista de todos los clientes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $customers = $this->dataServices->getAll();
        return view('Customer.index', compact('customers'));
    }

    /**
     * Método para mostrar el formulario de creación de un nuevo cliente.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $people = PeopleModel::all();
        return view('customer.create', compact('people'));
    }

    /**
     * Método para almacenar un nuevo cliente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->dataServices->create($request->all());
        return redirect()->route('customers.index');
    }

    /**
     * Método para mostrar los detalles de un cliente específico.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $customer = $this->dataServices->getById($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Método para mostrar el formulario de edición de un cliente.
     *
     * @param CustomerModel $customer
     * @return \Illuminate\View\View
     */
    public function edit(CustomerModel $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Método para actualizar los datos de un cliente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $customer = $this->dataServices->update($id, $request->all());
        if (!$customer) {
            abort(404, 'Customer not found');
        }
        return redirect()->route('customers.index');
    }

    /**
     * Método para eliminar un cliente de la base de datos.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $customer = $this->dataServices->delete($id);
        if (!$customer) {
            abort(404, 'Customer not found');
        }
        return redirect()->route('customers.index');
    }
}

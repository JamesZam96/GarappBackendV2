<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Http\Requests\StoreVehicle;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo VehicleModel.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo VehicleModel.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new VehicleModel());
    }

    /**
     * Muestra una lista de vehículos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vehicles = $this->dataServices->getAll();
        return view('vehicle.index', compact('vehicles'));
    }

    /**
     * Muestra el formulario para crear un nuevo vehículo.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Almacena un nuevo vehículo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $vehicle = $this->dataServices->create($request->all());
        return redirect()->route('vehicles.index');
    }

    /**
     * Muestra los detalles de un vehículo específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $vehicle = $this->dataServices->getById($id);
        return view('vehicle.show', compact('vehicle'));
    }

    /**
     * Muestra el formulario para editar un vehículo específico.
     *
     * @param  \App\Models\VehicleModel  $vehicle
     * @return \Illuminate\View\View
     */
    public function edit(VehicleModel $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Actualiza los datos de un vehículo en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $vehicle = $this->dataServices->update($id, $request->all());
        if (!$vehicle) {
            abort(404, 'Order not found');
        }
        return redirect()->route('vehicles.index');
    }

    /**
     * Elimina un vehículo de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $vehicle = $this->dataServices->delete($id);
        if (!$vehicle) {
            abort(404, 'Order not found');
        }
        return redirect()->route('vehicles.index');
    }
}

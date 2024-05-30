<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeople;
use App\Http\Services\DataServices;
use App\Models\CustomerModel;
use App\Models\PeopleModel;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo PeopleModel.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo PeopleModel.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new PeopleModel());
    }

    /**
     * Muestra una lista de personas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $peoples = $this->dataServices->getAll();
        $customers = CustomerModel::with('people')->get();
        return view('people.index', compact('peoples', 'customers'));
    }

    /**
     * Muestra el formulario para crear una nueva persona.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Almacena una nueva persona en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $people = $this->dataServices->create($request->all());
        return redirect()->route('peoples.index');
    }

    /**
     * Muestra los detalles de una persona específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $people = $this->dataServices->getById($id);
        return view('people.show', compact('people'));
    }

    /**
     * Muestra el formulario para editar una persona específica.
     *
     * @param  \App\Models\PeopleModel  $people
     * @return \Illuminate\View\View
     */
    public function edit(PeopleModel $people)
    {
        return view('people.edit', compact('people'));
    }

    /**
     * Actualiza los datos de una persona en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $people = $this->dataServices->update($id, $request->all());
        if (!$people) {
            abort(404, 'Order not found');
        }
        return redirect()->route('peoples.index');
    }

    /**
     * Elimina una persona de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $people = $this->dataServices->delete($id);
        if (!$people) {
            abort(404, 'Order not found');
        }
        return redirect()->route('peoples.index');
    }
}

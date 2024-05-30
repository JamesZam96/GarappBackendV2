<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DataServices;
use App\Models\BillModel;

class BillController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Bill.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Bill.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new BillModel());
    }

    /**
     * Muestra una lista de facturas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bills = $this->dataServices->getAll();
        return view('bills.index', compact('bills'));
    }

    /**
     * Muestra el formulario para crear una nueva factura.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bills.create');
    }

    /**
     * Almacena una nueva factura en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $bill = $this->dataServices->create($request->all());
        return redirect()->route('bills.index');
    }

    /**
     * Muestra los detalles de una factura específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $bill = $this->dataServices->getById($id);
        return view('bills.show', compact('bill'));
    }

    /**
     * Muestra el formulario para editar una factura específica.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\View\View
     */
    public function edit(BillModel $bill)
    {
        return view('bills.edit', compact('bill'));
    }

    /**
     * Actualiza los datos de una factura en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $bill = $this->dataServices->update($id, $request->all());
        if (!$bill) {
            abort(404, 'Bill not found');
        }
        return redirect()->route('bills.index');
    }

    /**
     * Elimina una factura de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $bill = $this->dataServices->delete($id);
        if (!$bill) {
            abort(404, 'Bill not found');
        }
        return redirect()->route('bills.index');
    }
}

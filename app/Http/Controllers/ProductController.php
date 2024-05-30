<?php

namespace App\Http\Controllers;
use App\Http\Services\DataServices;
use App\Models\Produc;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Produc.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Produc.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new ProductModel());
    }

    /**
     * Muestra una lista de producs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $producs = $this->dataServices->getAll();
        return view('producs.index', compact('producs'));
    }

    /**
     * Muestra el formulario para crear un nuevo produc.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('producs.create');
    }

    /**
     * Almacena un nuevo produc en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $produc = $this->dataServices->create($request->all());
        return redirect()->route('producs.index');
    }

    /**
     * Muestra los detalles de un produc específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $produc = $this->dataServices->getById($id);
        return view('producs.show', compact('produc'));
    }

    /**
     * Muestra el formulario para editar un produc específico.
     *
     * @param  \App\Models\Produc  $produc
     * @return \Illuminate\View\View
     */
    public function edit(ProductModel $produc)
    {
        return view('producs.edit', compact('produc'));
    }

    /**
     * Actualiza los datos de un produc en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $produc = $this->dataServices->update($id, $request->all());
        if (!$produc) {
            abort(404, 'Produc not found');
        }
        return redirect()->route('producs.index');
    }

    /**
     * Elimina un produc de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $produc = $this->dataServices->delete($id);
        if (!$produc) {
            abort(404, 'Produc not found');
        }
        return redirect()->route('producs.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Services\DataServices;
use App\Models\Category;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Servicio de datos para interactuar con el modelo Category.
     *
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Crea una nueva instancia del controlador.
     *
     * Inicializa el servicio de datos con el modelo Category.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new CategoryModel());
    }

    /**
     * Muestra una lista de categorías.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->dataServices->getAll();
        return view('categories.index', compact('categories'));
    }

    /**
     * Muestra el formulario para crear una nueva categoría.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Almacena una nueva categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $category = $this->dataServices->create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Muestra los detalles de una categoría específica.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $category = $this->dataServices->getById($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Muestra el formulario para editar una categoría específica.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(CategoryModel $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Actualiza los datos de una categoría en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $category = $this->dataServices->update($id, $request->all());
        if (!$category) {
            abort(404, 'Category not found');
        }
        return redirect()->route('categories.index');
    }

    /**
     * Elimina una categoría de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = $this->dataServices->delete($id);
        if (!$category) {
            abort(404, 'Category not found');
        }
        return redirect()->route('categories.index');
    }
}

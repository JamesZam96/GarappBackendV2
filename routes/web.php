<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

// Define las rutas relacionadas con el controlador PeopleController
Route::get('/peoples' , [PeopleController::class , 'index'])->name('peoples.index'); // Muestra una lista de personas
Route::get('/peoples/create', [PeopleController::class , 'create'])->name('peoples.create'); // Muestra el formulario para crear una nueva persona
Route::post('/peoples', [PeopleController::class, 'store'])->name('peoples.store'); // Almacena los datos de una nueva persona
Route::get('/peoples/{id}', [PeopleController::class , 'show'])->name('peoples.show'); // Muestra los detalles de una persona específica
Route::get('/peoples/{people}/edit', [PeopleController::class, 'edit'])->name('peoples.edit'); // Muestra el formulario de edición de una persona específica
Route::patch('peoples/{id}',[PeopleController::class, 'update'])->name('peoples.update'); // Actualiza los datos de una persona específica
Route::delete('/peoples/{id}', [PeopleController::class, 'destroy'])->name('peoples.destroy'); // Elimina una persona específica
// Define las rutas relacionadas con el controlador PeopleController

// Define las rutas relacionadas con el controlador VehicleController
Route::get('/vehicles' , [VehicleController::class , 'index'])->name('vehicles.index'); // Muestra una lista de vehículos
Route::get('/vehicles/create', [VehicleController::class , 'create'])->name('vehicles.create'); // Muestra el formulario para crear un nuevo vehículo
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store'); // Almacena los datos de un nuevo vehículo
Route::get('/vehicles/{id}', [VehicleController::class , 'show'])->name('vehicles.show'); // Muestra los detalles de un vehículo específico
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit'); // Muestra el formulario de edición de un vehículo específico
Route::patch('vehicles/{id}',[VehicleController::class, 'update'])->name('vehicles.update'); // Actualiza los datos de un vehículo específico
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy'); // Elimina un vehículo específico
// Define las rutas relacionadas con el controlador VehicleController

// Define las rutas relacionadas con el controlador OrderDetailController para las órdenes
Route::get('/orders' , [OrderController::class , 'index'])->name('orders.index'); // Muestra una lista de órdenes
Route::get('/orders/create', [OrderController::class , 'create'])->name('orders.create'); // Muestra el formulario para crear una nueva orden
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store'); // Almacena los datos de una nueva orden
Route::get('/orders/{id}', [OrderController::class , 'show'])->name('orders.show'); // Muestra los detalles de una orden específica
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit'); // Muestra el formulario de edición de una orden específica
Route::patch('orders/{id}',[OrderController::class, 'update'])->name('orders.update'); // Actualiza los datos de una orden específica
Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy'); // Elimina una orden específica
// Define las rutas relacionadas con el controlador OrderDetailController para las órdenes

// Define las rutas relacionadas con el controlador DeliveryController para las entregas
Route::get('/deliverys', [DeliveryController::class, 'index'])->name('deliverys.index'); // Muestra una lista de entregas
Route::get('/deliverys/create', [DeliveryController::class, 'create'])->name('deliverys.create'); // Muestra el formulario para crear una nueva entrega
Route::post('/deliverys', [DeliveryController::class, 'store'])->name('deliverys.store'); // Almacena los datos de una nueva entrega
Route::get('/deliverys/{id}', [DeliveryController::class, 'show'])->name('deliverys.show'); // Muestra los detalles de una entrega específica
Route::get('/deliverys/{delivery}/edit', [DeliveryController::class, 'edit'])->name('deliverys.edit'); // Muestra el formulario de edición de una entrega específica
Route::patch('deliverys/{id}', [DeliveryController::class, 'update'])->name('deliverys.update'); // Actualiza los datos de una entrega específica
Route::delete('/deliverys/{id}', [DeliveryController::class, 'destroy'])->name('deliverys.destroy'); // Elimina una entrega específica
// Define las rutas relacionadas con el controlador DeliveryController para las entregas


// Define las rutas relacionadas con el controlador CustomerController para los clientes
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index'); // Muestra una lista de clientes
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create'); // Muestra el formulario para crear un nuevo cliente
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store'); // Almacena los datos de un nuevo cliente
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show'); // Muestra los detalles de un cliente específico
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit'); // Muestra el formulario de edición de un cliente específico
Route::patch('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update'); // Actualiza los datos de un cliente específico
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy'); // Elimina un cliente específico
// Define las rutas relacionadas con el controlador CustomerController para los clientes

// Define las rutas relacionadas con el controlador CompanyController para las compañías
Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses.index'); // Muestra una lista de compañías
Route::match(['get','post'], '/warehouses', [WarehouseController::class, 'store'])->name('warehouses.create')->middleware('verify.role:administrador'); // Muestra el formulario para crear una nueva compañía
Route::get('/warehouses/{id}', [WarehouseController::class, 'show'])->name('warehouses.show'); // Muestra los detalles de una compañía específica
Route::get('/warehouses/{company}/edit', [WarehouseController::class, 'edit'])->name('warehouses.edit'); // Muestra el formulario de edición de una compañía específica
Route::patch('/warehouses/{id}', [WarehouseController::class, 'update'])->name('warehouses.update'); // Actualiza los datos de una compañía específica
Route::delete('/warehouses/{id}', [WarehouseController::class, 'destroy'])->name('warehouses.destroy'); // Elimina una compañía específica
// Define las rutas relacionadas con el controlador CompanyController para las compañías

// Define las rutas relacionadas con el controlador CategoryController para las categorías
Route::get('/categorys', [CategoryController::class, 'index'])->name('categorys.index'); // Muestra una lista de categorías
Route::get('/categorys/create', [CategoryController::class, 'create'])->name('categorys.create'); // Muestra el formulario para crear una nueva categoría
Route::post('/categorys', [CategoryController::class, 'store'])->name('categorys.store'); // Almacena los datos de una nueva categoría
Route::get('/categorys/{id}', [CategoryController::class, 'show'])->name('categorys.show'); // Muestra los detalles de una categoría específica
Route::get('/categorys/{category}/edit', [CategoryController::class, 'edit'])->name('categorys.edit'); // Muestra el formulario de edición de una categoría específica
Route::patch('/categorys/{id}', [CategoryController::class, 'update'])->name('categorys.update'); // Actualiza los datos de una categoría específica
Route::delete('/categorys/{id}', [CategoryController::class, 'destroy'])->name('categorys.destroy'); // Elimina una categoría específica
// Define las rutas relacionadas con el controlador CategoryController para las categorías

// Define las rutas relacionadas con el controlador OrderController para las order
Route::get('/order', [OrderController::class, 'index'])->name('order.index'); // Muestra una lista de order
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create'); // Muestra el formulario para crear una nueva categoría
Route::post('/order', [OrderController::class, 'store'])->name('order.store'); // Almacena los datos de una nueva categoría
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show'); // Muestra los detalles de una categoría específica
Route::get('/order/{orde}/edit', [OrderController::class, 'edit'])->name('order.edit'); // Muestra el formulario de edición de una categoría específica
Route::patch('/order/{id}', [OrderController::class, 'update'])->name('order.update'); // Actualiza los datos de una categoría específica
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->name('order.destroy'); // Elimina una categoría específica
// Define las rutas relacionadas con el controlador OrderController para las order


// Define las rutas relacionadas con el controlador ProducController para los producs
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Muestra una lista de products
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Muestra el formulario para crear un nuevo produc
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Almacena los datos de un nuevo produc
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // Muestra los detalles de un produc específico
Route::get('/products/{produc}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Muestra el formulario de edición de un produc específico
Route::patch('/products/{id}', [ProductController::class, 'update'])->name('products.update'); // Actualiza los datos de un produc específico
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('producs.destroy'); // Elimina un produc específico
// Define las rutas relacionadas con el controlador ProducController para los producs

// Define las rutas relacionadas con el controlador ServicesController para los servicios
Route::get('/services', [ServiceController::class, 'index'])->name('services.index'); // Muestra una lista de servicios
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create'); // Muestra el formulario para crear un nuevo servicio
Route::post('/services', [ServiceController::class, 'store'])->name('services.store'); // Almacena los datos de un nuevo servicio
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show'); // Muestra los detalles de un servicio específico
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit'); // Muestra el formulario de edición de un servicio específico
Route::patch('/services/{id}', [ServiceController::class, 'update'])->name('services.update'); // Actualiza los datos de un servicio específico
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy'); // Elimina un servicio específico
// Define las rutas relacionadas con el controlador ServicesController para los servicios

// Define las rutas relacionadas con el controlador BillController para las facturas
Route::get('/bills', [BillController::class, 'index'])->name('bills.index'); // Muestra una lista de facturas
Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create'); // Muestra el formulario para crear una nueva factura
Route::post('/bills', [BillController::class, 'store'])->name('bills.store'); // Almacena los datos de una nueva factura
Route::get('/bills/{id}', [BillController::class, 'show'])->name('bills.show'); // Muestra los detalles de una factura específica
Route::get('/bills/{bill}/edit', [BillController::class, 'edit'])->name('bills.edit'); // Muestra el formulario de edición de una factura específica
Route::patch('/bills/{id}', [BillController::class, 'update'])->name('bills.update'); // Actualiza los datos de una factura específica
Route::delete('/bills/{id}', [BillController::class, 'destroy'])->name('bills.destroy'); // Elimina una factura específica
// Define las rutas relacionadas con el controlador BillController para las facturas

Route::get('/auths', [AuthController::class, 'index'])->name('auths.index');
// Route::get('/register', [AuthController::class, 'create'])->name('auths.create');
// Route::post('/register', [AuthController::class , 'register'])->name('auths.store');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('auths.register');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('auths.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auths.logout')->middleware('auth');



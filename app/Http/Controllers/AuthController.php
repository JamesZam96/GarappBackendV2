<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuth;
use App\Http\Services\DataServices;
use App\Models\AuthModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Controlador para la autenticación de usuarios y gestión de registros.
 */
class AuthController extends Controller
{
    /**
     * @var DataServices
     */
    protected $dataServices;

    /**
     * Constructor que inicializa el servicio de datos.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataServices = new DataServices(new User());
    }

    /**
     * Muestra la página principal con una lista de registros.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $registers = $this->dataServices->getAll();
        return view('Auth.index', compact('registers'));
    }

    /**
     * Registra un nuevo usuario en la aplicación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.create');
        }

        $formateData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $register = $this->dataServices->create($formateData);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return view('auth.dash', compact('user'));
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 404);
        }
    }

    /**
     * Inicia sesión con las credenciales proporcionadas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.login');
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return view('auth.dash', compact('user'));
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 404);
        }
    }

    /**
     * Cierra sesión del usuario actual.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout()
    {
        Auth::logout();
        return view('Auth.index');
    }

    
}

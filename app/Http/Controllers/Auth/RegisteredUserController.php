<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Usuario;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:USUARIO'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        try {
            $user = Usuario::create([
                'USUARIO_NOME' => $request->name,
                'USUARIO_EMAIL' => $request->email,
                'USUARIO_SENHA' => Hash::make($request->password),
                'USUARIO_CPF' => $request->cpf,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Exibe a mensagem de erro para diagnóstico
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

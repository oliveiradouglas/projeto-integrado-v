<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:100',
            'email' => 'required|email|max:255|unique:usuario',
            'senha' => 'required|min:6|confirmed',
            'tipo' => 'required|integer|in:1,2',
            'cpf' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data) {
        return Usuario::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => bcrypt($data['senha']),
            'cpf' => str_replace(['.', '-'], ['', ''], $data['cpf']),
            'tipo' => $data['tipo'],
        ]);
    }
}

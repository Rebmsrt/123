<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Roles;
use Hamcrest\Core\AllOf;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/success';            //Изменил редирект после регистрации

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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:500'], //Добавил
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['required','mimes:jpg,jpeg,png','max:5120'], //Добавил
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $filename = time().'.'.$data['photo']->getClientOriginalExtension();
        $data['photo']->storeAs('public',$filename);
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'], //добавил
            'role' => $data['role'], //добавил
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => url('/public/storage/'.$filename),
        ]);
    }
// Добавляем публичную функцию показа главной страницы
    public function index(Roles $roles)
    {
        $roles = Roles::all();
        //      $roles = DB::table('roles')->get(); //Это второй способ обращения к базе данных. В этом случае добавляем: use Illuminate\Support\Facades\DB;
        return view('auth.register', ['roles' => $roles]);
    }
}

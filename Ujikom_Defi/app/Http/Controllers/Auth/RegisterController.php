<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use App\Models\Penulis;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // $role = 1;
        // return User::create([
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
        ]);

        $id_user = $user->id;
        $nama_user = $user->name;
        $email_user = $user->email;
        $pass_user = $user->password;
        $fotodefault = 'default.jpg';
        $is_admin = $user->is_admin;

        if ($is_admin == 1) {
            Admin::create([
                'id_admin' => '',
                'name' => $nama_user,
                'foto' => $fotodefault,
                'jenis_kelamin' => '',
                'jabatan' => '',
                'telpon' => '',
                'id' => $id_user,
            ]);
        } else if ($is_admin == 2) {
            Penulis::create([
                'id_penulis' => '',
                'username' => $nama_user,
                'password' => $pass_user,
                'id' => $id_user,
            ]);
        }

       return $user;

        // Register otomatis sebagai admin
    }
}

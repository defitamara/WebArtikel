<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use File; 
use PDF;
// use Illuminate\Support\Facades\Crypt;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Auth;

class DataUserAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::join('admin', 'admin.id', '=', 'users.id')
                   ->orderBy('id_admin','asc')
                   ->get();
        return view('backend.data_admin.index', compact('data'));
    }

    public function cetakpdf()
    {
        // $data_admin = User:: where('is_admin','=',1)
        // ->get();
        $data_admin = User::join('admin', 'admin.id', '=', 'users.id')
        ->orderBy('id_admin','asc')
        ->get();
    	$pdf = PDF::loadview('backend/data_admin/cetakpdf',['data_admin'=>$data_admin]);
    	return view('backend.data_admin.cetakpdf',compact('data_admin'));
    }

    public function create()
    {
        $role = Role::all();
        return view('backend.data_admin.create', compact('role'));
    }

    public function store(Request $request)
    {

        $nama = $request->name;  

        $role = $request->id_role;

        $user = User::create([
            'name' =>$nama,
            'email' =>$request->email,
            'is_admin' => $role,
            'password' => Hash::make($request->password),

        ]);

        $id_user = $user->id;
        $nama_user = $user->name;
        $jenis_kelamin = $request->jenis_kelamin;  
        $jabatan = $request->jabatan;
        $telpon = $request->telpon;
        $fotodefault = 'default.jpg';

        Admin::create([
            'name' => $nama_user,
            'jenis_kelamin' => $jenis_kelamin,
            'foto' => $fotodefault,
            'jabatan' => $jabatan,
            'telpon' => $telpon,
            'id' => $id_user,
        ]);

        return redirect()->route('data_admin.index')
                        ->with('success','Data Admin baru telah berhasil disimpan');
    }


    public function edit($id)
    {
        $role = Role::all();

        $data = Admin::select('admin.*','users.*')
                ->join('users', 'users.id', '=', 'admin.id')
                ->where('admin.id_admin', $id)->first();

        return view('backend.data_admin.edit', compact('role','data'));
    }

    public function update(Request $request, $id)
    { 
        $gbr=$request->nama_gambar;
        
        if($request->has('gambar')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('data/data_admin'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'name' => $request->name,
            'foto' => $getimageName,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jabatan' => $request->jabatan,
            'telpon' => $request->telpon,
        ];

        Admin::where('id_admin', $id)->update($data_simpan);

        $data_user = User::join('admin', 'admin.id', '=', 'users.id')
                ->where('admin.id_admin', $id)->first();

        $id_user = $data_user->id;
        $name_user = $data_user->name;
        $email_user = $request->email;

        $data_simpan2 = [
            'name' => $name_user,
            'email' => $email_user,
        ];

        User::where('id', $id_user)->update($data_simpan2);

        return redirect()->route('data_admin.index')
                        ->with('success','Data admin telah berhasil diperbarui');
        
    }

    public function ubahpw($id)
    {
        $data = User::join('admin', 'admin.id', '=', 'users.id')
                ->where('users.id', $id)->first();

        return view('backend.data_admin.ubahpw',compact('data'));
        
    }

    public function ubahpassword(Request $request, $id)
    {
        $message = [
            'numeric' => ':attributer harus diisi nomor.'
        ];

        $validator = FacadesValidator::make($request->all(),[
            'password' => 'required|string|max:40',
        ], $message)->validate();

        $data_update = [
            'password' => Hash::make($request->input('password')),
        ];

        User::where('id', $id)->update($data_update);

        return redirect()->route('data_admin.index')
                        ->with('success','Password Akun Admin telah berhasil diperbarui');   
    }


    public function destroy($id)
    {
        User::where('id',$id)->delete();
        Admin::where('id', $id)->delete();


        return redirect()->route('data_admin.index')
                        ->with('success','Data admin telah berhasil dihapus');
    }
}

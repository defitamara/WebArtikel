<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Penulis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 1) {
            return redirect()->route('dashboard');
        }else if ($role == 2) {
            return redirect()->route('dbpenulis');
        }else{
            $artikel = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','desc')
                   ->paginate(4);

            $artikeltop = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->paginate(6);

            return view('frontend.home', compact('artikel','artikeltop'));
        }
    }

    // Dashboard Super Admin
    public function dashboard()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 1) {
            return view('backend.dashboard');
        } else if ($role == 2) {
            return view('penulis.dbpenulis');
        }else{
            $artikel = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','desc')
                   ->paginate(4);

            $artikeltop = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->paginate(6);

            return view('frontend.home', compact('artikel','artikeltop'));
        }
    }

    // Dashboard Penulis
    public function dbpenulis()
    {
        $id = Auth::id();
        $user = User::where('id',$id)->first();

        $role = $user->is_admin;

        if ($role == 2) {
            return view('penulis.dbpenulis');
        } else if ($role == 1) {
            return view('backend.dashboard');
        }else{
            $artikel = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','desc')
                   ->paginate(4);

            $artikeltop = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->paginate(6);

            return view('frontend.home', compact('artikel','artikeltop'));
        }
    }
}

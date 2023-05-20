<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request,
App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Artikel;
use App\Models\Penulis;

class HomeController extends Controller
{
    public function index(){

        $artikel = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','desc')
                   ->paginate(4);

        $artikeltop = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->paginate(6);

        return view('frontend.home', compact('artikel','artikeltop'));
    }

    public function detailartikel($id)
    {
        $artikel = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->where('id_artikel',$id)
                   ->get();
        
        $artikellainnya = Artikel::join('tb_penulis', 'tb_penulis.id_penulis', '=', 'tb_artikel.id_penulis')
                   ->orderBy('id_artikel','asc')
                   ->where('id_artikel','!=', $id)
                   ->paginate(6);

        return view('frontend.detailartikel',compact('artikel','artikellainnya'));
    }
}
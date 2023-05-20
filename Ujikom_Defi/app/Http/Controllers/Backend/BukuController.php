<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Buku;
use App\Models\Kategori;

use Illuminate\Support\Carbon; 
use File; 
use PDF;

use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $buku = Buku::join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
                   ->orderBy('id_buku','asc')
                   ->get();
        return view('backend.data_buku.index', compact('buku'));
    }

    public function cetakpdf()
    {
        $buku = Buku::join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
                    ->orderBy('id_buku','desc')
                    ->get();

    	$pdf = PDF::loadview('backend/data_buku/cetakpdf',['buku'=>$buku]);
    	return view('backend.data_buku.cetakpdf',compact('buku'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('backend.data_buku.create',compact('kategori'));
    }
    public function store(Request $request)
    {
        // rename image name or file name 
        // $getimageName = time().'.'.$request->gambar->getClientOriginalExtension();
        // $request->gambar->move(public_path('data/data_artikel/'), $getimageName);

        // mengambil file gambar dan mengubah namanya 
        if ($request->hasFile('gambar')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('gambar')->getClientOriginalExtension();
        }

        $data_simpan = [
            'judul' => $request->judul,
            'gambar' => $getimageName,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'id_kategori' => $request->id_kategori,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'stok' => $request->stok,
        ];

        Buku::create($data_simpan);
        $upload_success = $request->file('gambar')->move(public_path('data/data_buku/'), $getimageName);

        return redirect()->route('data_buku.index')
        ->with('success','Buku baru berhasil disimpan.')
        ->with('image',$getimageName);
    }

    public function detail($id)
    {
        $buku = Buku::join('kategori', 'kategori.id_kategori', '=', 'buku.id_kategori')
                   ->orderBy('id_buku','asc')
                   ->where('id_buku',$id)
                   ->get();
        return view('backend.data_buku.detail',compact('buku'));
    }
    
    public function edit($id)
    {
        $buku = Buku::where('id_buku',$id)->first();
        $kategori = Kategori::all();
        return view('backend.data_buku.edit',compact('buku','kategori'));
    }

    public function update(Request $request, $id)
    {
        $gbr=$request->nama_gambar;
        
        if($request->has('gambar')) {
            $getimageName = rand(11111, 99999) . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('data/data_buku'), $getimageName);
        }else {
            $getimageName = $gbr;
        }

        $data_simpan = [
            'judul' => $request->judul,
            'gambar' => $getimageName,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'id_kategori' => $request->id_kategori,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'stok' => $request->stok,
        ];

        Buku::where('id_buku', $id)->update($data_simpan);

        return redirect()->route('data_buku.index')
                        ->with('success','Data buku telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Mengakses gambar di file dan menghapusnya
        $buku = Buku::where('id_buku',$id)->first();
        File::delete('/data/data_buku/'.$buku->gambar);

        // Menghapus data dari database
        Buku::where('id_buku',$id)->delete();

        return redirect()->route('data_buku.index')
                        ->with('success','Data buku telah berhasil dihapus');
    }
}

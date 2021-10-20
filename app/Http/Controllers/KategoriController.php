<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function kategori(){
        $kategoris = Kategori::all();
        return view('kategori.index',compact('kategoris'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nm_kategori'   =>  'Nama kategori',
        ];
        $this->validate($request, [
            'nm_kategori'    =>  'required',
        ],$messages,$attributes);
        $sudah = Kategori::select('nm_kategori')->get();
        for ($i=0; $i <count($sudah) ; $i++) { 
            if ($request->nm_kategori == $sudah[$i]->nm_kategori) {
                $notification = array(
                    'message' => 'Gagal, nama kategori sudah pernah ditambahkan!',
                    'alert-type' => 'error'
                );
                return redirect()->route('kategori')->with($notification);
            }
        }
        Kategori::create([
            'nm_kategori' => $request->nm_kategori,
        ]);
        $notification = array(
            'message' => 'Berhasil, nama kategori berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('kategori')->with($notification);
    }

    public function edit($id){
        $kategori = Kategori::find($id);
        return $kategori;
    }

    public function update(Request $request){
        $sudah = Kategori::select('nm_kategori')->get();
        for ($i=0; $i <count($sudah) ; $i++) { 
            if ($request->nm_kategori == $sudah[$i]->nm_kategori) {
                $notification = array(
                    'message' => 'Gagal, kategori sudah pernah ditambahkan!',
                    'alert-type' => 'error'
                );
                return redirect()->route('kategori')->with($notification);
            }
        }

        Kategori::where('id',$request->id)->update([
            'nm_kategori' => $request->nm_kategori,
        ]);
        $notification = array(
            'message' => 'Berhasil, kategori berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori')->with($notification);
    }

    public function delete(Request $request){
        $kategori = Kategori::find($request->id);
        $kategori->delete();
        $notification = array(
            'message' => 'Berhasil, kategori berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('kategori')->with($notification);
    }

}

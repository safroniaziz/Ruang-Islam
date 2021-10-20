<?php

namespace App\Http\Controllers;

use App\Models\Istilah;
use App\Models\Kategori;
use Illuminate\Http\Request;

class IstilahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function istilah(){
        $istilahs = Istilah::join('kategoris','kategoris.id','istilahs.kategori_id')
                            ->select('istilahs.id','nm_kategori','nm_istilah','arti','keterangan')
                            ->get();;
        $kategoris = Kategori::all();
        return view('istilah.index',compact('istilahs','kategoris'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'kategori_id'   =>  'Kategori',
            'nm_istilah'   =>  'Nama istilah',
            'arti'   =>  'Arti',
            'keterangan'   =>  'Deskripsi',
        ];
        $this->validate($request, [
            'nm_istilah'    =>  'required',
            'kategori_id'    =>  'required',
            'arti'    =>  'required',
            'keterangan'    =>  'required',
        ],$messages,$attributes);
        $sudah = Istilah::select('nm_istilah')->get();
        for ($i=0; $i <count($sudah) ; $i++) { 
            if ($request->nm_istilah == $sudah[$i]->nm_istilah) {
                $notification = array(
                    'message' => 'Gagal, nama istilah sudah pernah ditambahkan!',
                    'alert-type' => 'error'
                );
                return redirect()->route('istilah')->with($notification);
            }
        }
        Istilah::create([
            'nm_istilah' => $request->nm_istilah,
            'kategori_id' => $request->kategori_id,
            'arti' => $request->arti,
            'keterangan' => $request->keterangan,
        ]);
        $notification = array(
            'message' => 'Berhasil, nama istilah berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('istilah')->with($notification);
    }

    public function edit($id){
        $istilah = Istilah::find($id);
        return $istilah;
    }

    public function update(Request $request){
        $sudah = Istilah::select('nm_istilah')->get();
        for ($i=0; $i <count($sudah) ; $i++) { 
            if ($request->nm_istilah == $sudah[$i]->nm_istilah) {
                $notification = array(
                    'message' => 'Gagal, istilah sudah pernah ditambahkan!',
                    'alert-type' => 'error'
                );
                return redirect()->route('istilah')->with($notification);
            }
        }

        Istilah::where('id',$request->id)->update([
            'nm_istilah' => $request->nm_istilah,
        ]);
        $notification = array(
            'message' => 'Berhasil, istilah berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->route('istilah')->with($notification);
    }

    public function delete(Request $request){
        $istilah = Istilah::find($request->id);
        $istilah->delete();
        $notification = array(
            'message' => 'Berhasil, istilah berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('istilah')->with($notification);
    }
}

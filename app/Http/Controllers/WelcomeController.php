<?php

namespace App\Http\Controllers;

use App\Models\Istilah;
use App\Models\Kategori;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $istilahs = Istilah::join('kategoris','kategoris.id','istilahs.kategori_id')->select('istilahs.id','nm_kategori','arti','nm_istilah')->get();
        $semua = count(Istilah::all());
        $pendidikan = count(Istilah::where('kategori_id',4)->get());
        $ekonomi = count(Istilah::where('kategori_id',5)->get());
        $gelar = count(Istilah::where('kategori_id',6)->get());

        $psemua = $semua/$semua * 100;
        $ppendidikan = $pendidikan/$semua * 100;
        $pekonomi = $ekonomi/$semua * 100;
        $pgelar = $gelar/$semua * 100;
        $kategoris = Kategori::all();
        return view('layouts.layout',compact('istilahs','kategoris','semua','pendidikan','ekonomi','gelar','psemua','ppendidikan','pekonomi','pgelar'));
    }

    public function cariIstilah($id){
        $istilah = Istilah::where('id',$id)->select('keterangan','nm_istilah')->first();
        return $istilah;
    }
}

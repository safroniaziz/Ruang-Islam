<?php

namespace App\Http\Controllers;

use App\Models\Istilah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $semua = count(Istilah::all());
        $pendidikan = count(Istilah::where('kategori_id',4)->get());
        $ekonomi = count(Istilah::where('kategori_id',5)->get());
        $gelar = count(Istilah::where('kategori_id',6)->get());

        $statistik = Istilah::join('kategoris','kategoris.id','istilahs.kategori_id')->select('nm_kategori',DB::raw('count(istilahs.id) as jumlah'))->groupBy('kategori_id')->get();
        return view('home',compact('semua','pendidikan','ekonomi','gelar','statistik'));
    }
}

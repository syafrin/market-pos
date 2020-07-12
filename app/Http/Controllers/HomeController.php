<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Agent;
use App\TransactionCart;
use App\TransactionCartDetail;
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
         $product = Product::count();
        $agent = Agent::count();
        $trans = TransactionCartDetail::sum('jumlah');
        $transcome = TransactionCART::sum('total');

        $nama_product = [];
        $jml_penjualan = [];
        $data = Product::all();
        foreach($data as $row){
            $nama_product[] = $row->nama_produk;

            $transaksi = TransactionCartDetail::where('kd_produk', $row->kd_produk)->sum('jumlah');
            $jml_penjualan[] = $transaksi;
        }
        return view('home', compact('product','agent','trans','transcome','nama_product','jml_penjualan'));
    }
}

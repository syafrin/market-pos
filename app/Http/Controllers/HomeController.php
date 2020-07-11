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
        return view('home', compact('product','agent','trans','transcome'));
    }
}

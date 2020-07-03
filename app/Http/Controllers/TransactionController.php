<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Product;
use App\Supplier;
use Validator;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaction = Transaction::orderBy('tgl_transaksi','DESC')->paginate(5);
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        if($start != '' and $end != ''){
            $transaction = Transaction::whereBetween('tgl_transaksi', [$start, $end])->orderBy('tgl_transaksi', 'DESC')->paginate(5);
            $start = \Carbon\Carbon::parse($start)->format('d-F-Y');
            $end = \Carbon\Carbon::parse($end)->format('d-F-Y');
        }
        return view('transaction.index', compact('transaction','start','end'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $supplier = Supplier::all();
        return view('transaction.create', compact('product','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->all();
        $validator = Validator::make($data, [
            'tgl_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            ''
        ]);

        if($validator->fails()){
            return redirect()->route('transaction.create')->withErrors($validator)->withInput();
        }

        Transaction::create($data);
        $produk = Product::find($data['kd_produk']);
        $datap['stok'] = $produk->stok + $data['jumlah'];
        $produk->update($datap);

        return redirect()->route('transaction.index')->with('status','Transaksi Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $transaction = Transaction::findOrFail($id);
    $jml = $transaction->jumlah;

    $product = Product::find($transaction->kd_produk);
    $data['stok'] = $product->stok - $jml;
    $product->update($data);

    $transaction->delete();
    return redirect()->route('transaction.index')->with('status','transaksi berhasil dihapus');

    }
}

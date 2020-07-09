<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Cart;
use App\Product;
use Validator;
use App\TransactionCart;
use App\TransactionCartDetail;
use Illuminate\Support\Facades\DB;
class TransactionCartController extends Controller
{

    private function get_no_faktur()
    {
        $query = DB::select('SELECT MAX(RIGHT(no_faktur,6)) AS max_faktur FROM saletransactions WHERE DATE(tgl_penjualan)=CURDATE()');
        $kd = "";
        if(count($query) > 0){
                foreach($query as $row)
                {
                    $tmp = ((int)$row->max_faktur)+1;
                    $kd = sprintf("%06s", $tmp);
                }
        }else{
            $kd = "000001";
        }
        $hasil =  date('dmy').$kd;
        return $hasil;
    }

     private function get_total_cart($username)
    {
        $data_keranjang = Cart::where('username',$username)->get();
        $total = 0;
        foreach($data_keranjang as $row)
        {
            $total = $total + ($row->jumlah * $row->harga);
        }
        return $total;
    }

    public function add_cart(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            'username' => 'required|max:100',
            'kd_produk' => 'required|numeric',
            'jumlah' => 'required|numeric'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()
            ], 400);
        }

        $input['username'] = $request->input('username');
        $input['kd_produk'] = $request->input('kd_produk');
        $input['jumlah'] = $request->input('jumlah');

        //mencari data stok produk
        $produk = Product::find($data['kd_produk']);
        $stok_product = $produk['stok'];

        //memcari jumlah produk dalam tabel keranjang
        $jml_brng_cart = Cart::where('kd_produk', $data['kd_produk'])->sum('jumlah');

        $stok_hasil = $stok_product - $jml_brng_cart;

        //jika stock hasil < jumlah input jml produk kranjang
        if($stok_hasil < $input['jumlah']){
            return response()->json([
                'status' => FALSE,
                'message' => 'Stock Barang tidak Mencukupi'
            ],200);
        }

        $input['harga'] = $produk->harga;
        Cart::create($input);
        return response()->json([
            'status' => TRUE,
            'message' => 'data berhasil ditambahkan'
        ], 201);



    }



    public function get_cart(Request $request){
        $username = $request->input('username');
        $cart = Cart::where('username', $username)->get();

        if($cart->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'message' => 'Cart Kosong'
            ]);
        }else {
            return CartResource::collection($cart);
        }
    }

    public function delete_item(Request $request){
        $id_cart = $request->input('kd_keranjang');
        $keranjang = Cart::find($id_cart);
        
        if(is_null($keranjang)){
            return response()->json([
                'status' => FALSE,
                'message' => 'data tidak ditemukan'
            ], 404);
        }

        $keranjang->delete();
         return response()->json([
                'status' => TRUE,
                'message' => 'data item berhasil dihapus'
            ], 200);
    }

    public function delete_cart(Request $request){
        $username = $request->input('username');
        Cart::where('username', $username)->delete();
        return response()->json([
                'status' => TRUE,
                'message' => 'data keranjang belanja berhasil dihapus'
            ], 200);
    }

    public function checkout(Request $request){
        $data['tgl_penjualan'] = date("Y-m-d");
        $data['kd_agen'] = $request->input('kd_agen');
        $data['username'] = $request->input('username');
        $data['no_faktur'] = $this->get_no_faktur();
        $data['total'] = $this->get_total_cart($data['username']);   
        TransactionCart::create($data);

        $cart = Cart::where('username', $data['username'])->get();

        foreach($cart as $row){
            $data_cart['no_faktur'] = $data['no_faktur'];
            $data_cart['kd_produk'] = $row->kd_produk;
            $data_cart['jumlah'] = $row->jumlah;
            $data_cart['harga'] = $row->harga;

            TransactionCartDetail::create($data_cart);

            $product = Product::find($row->kd_produk);
            $item_produk['stok'] = $product->stok - $row->jumlah;
            $product->update($item_produk);
        }

        Cart::where('username', $data['username'])->delete();
        return response()->json([
            'status' => TRUE,
            'message' => 'Checkout Berhasil'
        ]);
    }


}

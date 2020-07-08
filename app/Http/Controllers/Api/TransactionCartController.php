<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Cart;
use App\Product;
use Validator;
class TransactionCartController extends Controller
{
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
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;
class ProductController extends Controller
{
    public function get_product_category(Request $request){
        $kode = $request->input('kd_kategori');
        $product = Product::where([
            ['kd_kategori', $kode],
            ['stok', '>', 0 ]
        ])->get();

        if($product->isEmpty()){
            return response()->json([
                'status' => FALSE,
                'message' => 'produk tidak ditemukan'
            ], 200);
        }

        return ProductResource::collection($product);
    }
}

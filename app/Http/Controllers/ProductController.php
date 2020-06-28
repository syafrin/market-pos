<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Validator;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $product = Product::paginate(5);
        $key = $request->get('keyword');
        if($key){
            $product = Product::where('nama_produk', 'LIKE', "%$key%")->paginate(5);
        }
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga'       => 'required|numeric',
            'img_produk'=>'required|image|mimes:jpeg,jpg,png|max:2048'
            
        ]);
        if($validasi->fails()){
            return redirect()->route('product.create')->withInput()->withErrors($validasi);
        }
       

        if($request->file('img_produk')->isValid()){
             $img = $request->file('img_produk');
            $ext = $img->getClientOriginalExtension();
            $nm_img = "product/".date('YmdHis').".".$ext;
            $path = 'public/uploads/product';
            $request->file('img_produk')->move($path, $nm_img);
            $data['img_produk'] = $nm_img;
        }
        $data['stok'] = 0;
        Product::create($data);
        return redirect()->route('product.index')->with('status', 'Product Berhasil Ditambahkan');
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
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('product.edit', compact('category','product'));
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
        $product = Product::findOrfail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama_produk' => 'required|max:255',
            'kd_kategori' => 'required',
            'harga'       => 'required|numeric',
            'image'=>'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validasi->fails()){
            return redirect()->route('product.edit', [$id])->withInput()->withErrors($validasi);
        }

        if($request->hasFile('img_produk')){
            if($request->file('img_produk')->isValid()){
                Storage::disk('upload')->delete($product->img_produk);
                $img = $request->file('img_produk');
                $ext = $img->getClientOriginalExtension();
                $nm_img = "product/".date('YmdHis').".".$ext;
                $path = 'public/uploads/product';
                $request->file('img_produk')->move($path, $nm_img);
                $data['img_produk'] = $nm_img;
                
            }

        }

        $product->update($data);
        return redirect()->route('product.index')->with('status','Produk berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Storage::disk('upload')->delete($product->img_produk);
        return redirect()->route('product.index')->with('status', 'Produk berhasil dihapus');
    }
}

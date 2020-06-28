<?php

namespace App\Http\Controllers;
use App\Category;
use Validator;
use Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::paginate(5);
        $key = $request->get('keyword');
        if($key){
            $category = Category::where('kategori', 'LIKE', "%$key%")->paginate(5);
        }
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'kategori' => 'required|max:255',
            'image'=>'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if($validasi->fails()){
            return redirect()->route('category.create')->withInput()->withErrors($validasi);
        }
        $img = $request->file('image');
        $ext = $img->getClientOriginalExtension();

        if($request->file('image')->isValid()){
            $nm_img = "category/".date('YmdHis').".".$ext;
            $path = 'public/uploads/category';
            $request->file('image')->move($path, $nm_img);
            $data['image'] = $nm_img;
        }
        Category::create($data);
        return redirect()->route('category.index')->with('status', 'Kategori Barang Berhasil Ditambahkan');

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
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
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
        $category = Category::findOrfail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'kategori' => 'required|max:255',
            'image'=>'sometimes|nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validasi->fails()){
            return redirect()->route('category.edit',[$id])->withInput()->withErrors($validasi);
        }

        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                Storage::disk('upload')->delete($category->image);
                $img = $request->file('image');
                $ext = $img->getClientOriginalExtension();
                $nm_img = "category/".date('YmdHis').".".$ext;
                $path = 'public/uploads/category';
                $request->file('image')->move($path, $nm_img);
                $data['image'] = $nm_img;
                
            }

        }

        $category->update($data);
        return redirect()->route('category.index')->with('status','Kategori berhasil diupdate');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Storage::disk('upload')->delete($category->image);
        return redirect()->route('category.index')->with('status', 'Kategori berhasil dihapus');
    }
}

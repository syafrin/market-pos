<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Validator;
use Illuminate\Support\Arr;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
             $supplier = Supplier::paginate(5);
             $key = $request->get("keyword");
            if($key){
                $supplier = Supplier::where('nama_supplier','LIKE', "%$key%")->paginate(5);
             }
            return view('supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('supplier.create');
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
            'nama_supplier'=> 'required|max:255',
            'alamat_supplier'=>'required|max:255'
        ]);

        if($validasi->fails()){
            return redirect()->route('supplier.create')->withInput()->withErrors($validasi);
        }
        Supplier::create($data);
        return redirect()->route('supplier.index')->with('status', 'Supplier Berhasil Ditambahkan');
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
        $data = Supplier::findOrFail($id);
        return view('supplier.edit',compact('data'));
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
        $supplier = Supplier::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'nama_supplier'=>'required|max:255,'.$id,
            'alamat_supplier' => 'required|max:255,'.$id
        ]);
        if($validasi->fails()){
            return redirect()->route('supplier.edit', [$id])->withErrors($validasi);
        }
       $supplier->update($data);
        return redirect()->route('supplier.index')->with('status','Data Supplier Berhasil Dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('status', 'Data Supplier Berhasil Dihapus');
    }
}

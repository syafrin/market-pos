<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use Validator;
use Illuminate\Support\Arr;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employe = Employe::paginate(5);
        $key = $request->get("keyword");
        if($key){
               $employe = Employe::where('nama_pegawai','LIKE', "%$key%")->paginate(5);
          }
        return view('employe.index',compact('employe'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe.create');
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
            'username'=> 'required|max:100|unique:employes',
            'password'=>'required|min:6|max:50',
            'nama_pegawai'=>'required|max:255',
            'alamat'=>'required|max:255'
        ]);
        if($validasi->fails()){
                return redirect()->route('employe.create')->withInput()->withErrors($validasi);
            }
        $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        Employe::create($data);
        return redirect()->route('employe.index')->with('status', 'Pegawai Berhasil Ditambahkan');
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
        $employe = Employe::findOrFail($id);
        return view('employe.edit', compact('employe'));
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
        $employe = Employe::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data, [
            'password'=>'sometimes|nullable|min:6|max:50',
            'nama_pegawai'=>'required|max:255',
            'alamat'=>'required|max:255'
        ]);
        if($validasi->fails()){
            return redirect()->route('employe.edit', [$id])->withInput()->withErrors($validasi);
        }

        if($request->input('password')){
            $data['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        }else {
            $data = Arr::except($data, ['password']);
        }
        $employe->update($data);
        return redirect()->route('employe.index')->with('status','Data Pegawai Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employe.index')->with('status', 'Data Pegawai Berhasil Dihapus');
    }
}

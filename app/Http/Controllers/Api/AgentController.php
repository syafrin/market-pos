<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Agent;
use Validator;
use Storage;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AgentResource::collection(Agent::all());
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
        $validator = Validator::make($data,[
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'img_toko' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()
            ], 400);
        }

         if($request->file('img_toko')->isValid()){
             $img = $request->file('img_toko');
            $ext = $img->getClientOriginalExtension();
            $nm_img = "agent/".date('YmdHis').".".$ext;
            $path = 'public/uploads/agent';
            $request->file('img_toko')->move($path, $nm_img);
            $data['img_toko'] = $nm_img;
        }

        if(Agent::create($data)){
            return response()->json([
                'status' => TRUE,
                'message' => 'Agen Berhasil disimpan'
            ], 201);
        }else{
            return response()->json([
                'status'=> FALSE,
                'message' => 'Agen Gagal Disimpan'
            ], 200);
        }
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
        //
    }
}

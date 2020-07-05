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
            'img_toko' => 'required|image|mimes:jpeg,jpg,png|max:2048'
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
        $agent = Agent::find($id);
        if(is_null($agent)){
            return response()->json([
                'status'=>FALSE,
                'message'=>'Record Not Found'
            ], 404);
        }
         return new AgentResource($agent);
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
        $data = $request->all();
        $agent = Agent::findOrFail($id);
        if(is_null($agent)){
             return response()->json([
                'status'=>FALSE,
                'message'=>'Record Not Found'
            ], 404);
        }
        $validator  = Validator::make($data, [
            'nama_toko' => 'required|max:255',
            'nama_pemilik' => 'required|max:255',
            'alamat' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'img_toko' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()
            ], 400);
        }
        
        if($request->hasFile('img_toko')){
            if($request->file('img_toko')->isValid()){

                Storage::disk('upload')->delete($agent->img_toko);

               $img = $request->file('img_toko');
               $ext = $img->getClientOriginalExtension();
               $nm_img = "agent/".date('YmdHis').".".$ext;
               $path = 'public/uploads/agent';
               $request->file('img_toko')->move($path, $nm_img);
               $data['img_toko'] = $nm_img;
           }

        }

        $agent->update($data);
        return response()->json([
            'status' => TRUE,
            'message' =>  'data berhasil diupdate'
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        if(is_null($agent)){
            return response()->json([
                'status' => FALSE,
                'message' => 'Record Not Found'
            ], 404);
        }
        $agent->delete();
        Storage::disk('upload')->delete($agent->img_toko);  
        return response()->json([
            'status' => TRUE,
            'message' => 'Data berhasil dihapus'
        ], 200);

    }

    public function search(Request $request){
        $filter = $request->get('keyword');
        return AgentResource::collection(Agent::where('nama_toko', 'LIKE', "%$filter%")->get());
        
    }
}

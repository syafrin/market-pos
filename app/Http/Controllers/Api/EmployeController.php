<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employe;
use Validator;
use App\Http\Resources\EmployeResource;

class EmployeController extends Controller
{
    public function login_employe(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()
            ], 400);
        }

        $user = $request->input('username');
        $pass = $request->input('password');

        $employe = Employe::where([['username', $user],['is_active', 1]])->first();
        if(is_null($employe)){
            return response()->json([
                 'status' => FALSE,
                'message' => 'username tidak ditemukan'
            ], 200);
        }else{
                if(password_verify($pass, $employe->password)){
                     return response()->json([
                            'status' => TRUE,
                            'message' => 'password ok',
                            'pegawai' => new EmployeResource($employe)
                        ], 200);


                  }else{
                     return response()->json([
                            'status' => FALSE,
                            'message' => 'username dan password tidak sesuai'
                        
                        ], 200);

                  }

        }
    }
}

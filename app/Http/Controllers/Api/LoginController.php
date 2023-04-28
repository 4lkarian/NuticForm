<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\farmacoController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\farmaco;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);
        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'token'=>$request->user()->createToken($request->name)->plainTextToken,
                'message'=>'Succes'
            ]);

    }
    return response()->json([
        'message'=>'Unautenticated'
    ],401); 
}
public function query(Request $farmaco)
    {
        //return new FarmacoResource($farmaco);
        $farmaco = farmaco::select('farmaco.*')
        ->where('farmaco','like',$farmaco->consultar)
        ->get();
        return $farmaco;

    }
public function validateLogin(Request $request){
    return $request->validate([
        'email'=>'required|email',
        'password'=> 'required',
        'name'=> 'required'
    ]);
}
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\farmacController;
use App\Models\farmaco;

use App\Http\Resources\V1\FarmacoResource;
use Illuminate\Http\Request;

class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //return FarmacoResource::collection(farmaco::latest()->paginate());
        return FarmacoResource::collection(farmaco::latest()->paginate());
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return FarmacoResource::collection(farmaco::latest()->paginate());

    }
    ///retorna busquedas coinicidientes
    public function query(Request $farmaco)
    {
        //return new FarmacoResource($farmaco);
        $farmaco = farmaco::select('farmacos.')
        ->where('farmaco','like',$farmaco->consultar)
        ->get();
        return $farmaco;

    }
    ///
    /**
     * Display the specified resource.
     */
    public function show(farmaco $farmaco)
    {
        return new FarmacoResource($farmaco);

    }
    //////
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, farmaco $farmaco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(farmaco $farmaco)
    {
        if($farmaco->delete()){
            return response()->json([
                'message'=>'success'
            ],204);
        }
        return response()->json([
            'message'=>'not found'
        ],404);
    }
}

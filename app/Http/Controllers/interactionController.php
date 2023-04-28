<?php

namespace App\Http\Controllers;

use App\Models\interaccion;
use Illuminate\Http\Request;
use App\Models\farmaco;


class interactionController extends Controller
{
    public function index(){
        return view('/main');
        
        
     }
     public function show(){
        return view('/');
     }
    public function store(Request $request){
       

        $inter= new interaccion();
        $inter->tipo_interaccion=$request->tipo;
        $inter->id_farmaco=$request->idfarm;
        $inter->nombre_interaccion=$request->nombre;
        $inter->recomendacion=$request->recom;
        $inter->status=$request->stat;
       

        //Comentario X
        //return $inter;
        $inter->save();
        
        ///Expreimento
        return redirect('/dbs');
    }
    public function mainStorage(Request $request){
        $inter= new interaccion();
        $inter->tipo_interaccion=$request->tipo;
        $inter->id_farmaco=$request->idFarm;
        $inter->nombre_interaccion=$request->nombre;
        $inter->recomendacion=$request->recom;
        $inter->status=$request->stat;
       

        //Comentario X
        //return $inter;
        $inter->save();
        
        ///Expreimento
        return redirect('/');
    }
    public function view($id){
        //return $id;
        return view('inter',['id'=>$id]);
    }

}

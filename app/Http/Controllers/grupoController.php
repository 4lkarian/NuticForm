<?php

namespace App\Http\Controllers;

use App\Models\biblio;
use App\Models\farmaco;

use App\Models\grupofarmaco;
use App\Models\interaccion;
use Illuminate\Http\Request;

class grupoController extends Controller
{
    public function index(){
       // return view('main');
       $grupos = grupoFarmaco::all();
       $farmacos =farmaco::all();
       $bibs = biblio::all();
       
       //return view('/main', ['grupos'=> $grupos],['farmacos'=> $farmacos]);
       return view('/main', compact('grupos','farmacos', 'bibs'));
    }
    public function index2(){
       $grupos = grupoFarmaco::all();
       $farmacos =farmaco::all();
       $inters = interaccion::all();
       $bibliografias= biblio::all();
       $inters = interaccion::all();
       //return $bibliografias;
       return view('/dbs', compact('grupos','farmacos', 'inters', 'bibliografias', 'inters'));
    }
    public function create(){
        return view('main');
    }
    public function store(Request $request){
        $grup= new grupoFarmaco();
        $grup->grupo=$request->grupo;
        $grup->subgrupo=$request->subgrupo;
        $grup->status=$request->estatus;
        //return $grup;
        $grup->save();
        //$grup->redirect('/main');
        ///Expreimento
        return redirect('/'); 
    }
    public function delete($idt){
        
    }
    public function show($group){
        return view('show',['group'=>$group]);
    }
    public function destroy($id){
        $dato = farmaco::find($id);
        $dato->delete();
        return redirect('/dbs');
     }
     public function destroyG($id){
        $dato = grupofarmaco::find($id);
        $dato->delete();
        return redirect('/dbs');
     }
     public function destroyB($id){
        $dato = biblio::find($id);
        $dato->delete();
        return redirect('/dbs');
     }
     public function updateG(Request $req){
     
         $grup=  grupoFarmaco::find($req->id);
        $grup->grupo=$req->grupo;
        $grup->subgrupo=$req->subgrupo;
        $grup->status=$req->estatus;
        //return $grup;
        $grup->update();
        //$grup->redirect('/main');
        ///Expreimento
        return redirect('/dbs'); 

     }
     public function viewE($id){
      //return $id;
      $data = grupofarmaco::find($id);
      return view('/edits/editarB',['id'=>$id, 'data'=>$data]);
     }
     
}

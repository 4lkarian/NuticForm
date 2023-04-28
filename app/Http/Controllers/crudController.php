<?php

namespace App\Http\Controllers;

use App\Models\biblio;
use App\Models\farmaco;
use App\Models\interaccion;
use App\Models\relacion;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function farmeditar(farmaco $data){
        $info = farmaco::all();
        return view('editar', ['farmacos'=>$info]);
    }
    public function destroy($id){
        $farma = farmaco::findOrFail($id);
        $farma->delete();
        //sreturn $farm;
        return view('dbs');
        
    }
    public function viewc($id){
        $farm = $id;
        $inters = interaccion::all();
        //return $farm;
        return view('/adons/interact', compact('farm', 'inters'));
    }
    public function newr(){

        
        $fam= farmaco::all();
        $bib= biblio::all();
        $relas = relacion::all();
        return view('/adons/rels', compact('fam', 'bib', 'relas'));
    }
    public function storageRel(Request $req){
        
        $rel = new relacion();
        $rel->id_farmaco= $req->idFarm;
        $rel->id_biblio= $req->idBib;
        $rel->save();
        //return $rel;
        return back();

    }
    public function consulta($id){
        $con = farmaco::find($id);
        $bb= biblio::all();
        $inte = interaccion::all();
        $rel = relacion::all();

       return view('/adons/consulta', compact('con', 'bb', 'inte', 'rel'));
        //return $rel->id_farmaco;

    }
}

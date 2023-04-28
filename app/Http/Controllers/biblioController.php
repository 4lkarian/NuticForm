<?php

namespace App\Http\Controllers;

use App\Models\biblio;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;

class biblioController extends Controller
{
    public function view($id){
        //return $id;
        $data = biblio::find($id);
        return view('/edits/editC', ['data'=>$data]);
    }
    public function updateB(Request $req){

        $bib = biblio::find($req->id);
        $bib->titulo=$req->titulo;  
        $bib->descripcion=$req->desc;
        $bib->autor=$req->autor;
        $bib->anio=$req->anio;
        $bib->editorial=$req->editorial;
        $bib->status=$req->status;

        $bib->update();
        return view('/dbs');

    }
    public function viewW($id){
        
        $data = biblio::find($id);
        return $data;
        //return view('/adons/biblios', compact('data'));
    }
    public function storenew(Request $req){
        $bib = new biblio();
        $bib->titulo=$req->titulo;
        $bib->descripcion=$req->desc;
        $bib->autor=$req->autor;
        $bib->anio=$req->anio;
        $bib->editorial=$req->editorial;
        $bib->status=$req->status;

        $bib->save();
        return back();
        //return $bib;
    } 
}

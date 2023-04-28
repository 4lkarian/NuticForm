<?php

namespace App\Http\Controllers;
use App\Models\farmaco;
use App\Models\biblio;
use App\Models\relacion;
// use App\Http\Controllers\Storage;
use App\Models\grupofarmaco;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class farmacoController extends Controller
{
    public function index(){
        return view('main');
    }
    /*
    public function store(Request $req){
        
        $farm= new farmaco();
        $farm->farmaco=$req->nombre;
        $farm->mecanismo=$req->meca;
        
        
        $img= $req->file('url');
        $name= Str::slug($req->nombre).".".$img->getClientOriginalExtension();
        $ruta = public_path('storage/refs');
        $img ->move($ruta, $name);
        $farm->url= $name;

        $farm->efecto=$req->efect;
        $farm->id_grupo=$req->idGroup; 
        $farm->status=$req->stat;
        

        $farm->save();
        //return redirect('/');
        //return $farm;
        return redirect('/');
    }*/
    public function store(Request $req){
        

        $farm= new farmaco();
        $path = Storage::disk('google')->put('nutricIMG', $req->file('url'));
        $url= Storage::disk('google')->url($path);
        //dd($url);

        $farm->farmaco=$req->nombre;
        $farm->mecanismo=$req->meca;
        
        
        $img= $req->file('url');
        $name= Str::slug($req->nombre).".".$img->getClientOriginalExtension();
        /*$ruta = public_path('storage/refs');
        $img ->move($ruta, $name);*/
        $farm->url= $name;

        $farm->efecto=$req->efect;
        $farm->id_grupo=$req->idGroup; 
        $farm->status=$req->stat;
        

        $farm->save();
        //return redirect('/');
        //return $farm;
        return redirect('/');
    }
    public function view(){
        $famraco = farmaco::all();
        $grupos = grupofarmaco::all();
        return view('/main');
    }
    public function updateFarm(Request $req){
        //return $req;

        //$farm = $req->id;
        $farm=  farmaco::find($req->id);
        $farm->farmaco=$req->nombre;
        $farm->mecanismo=$req->meca;
        //$farm->url=$req->file('url');

        if ($req->hasFile('url')) {
            $loc= 'storage/refs/'. $farm->url;
            if(File::exists($loc)){
                File::delete($loc);
            }
            $img= $req->file('url');
            $name= Str::slug($req->nombre).".".$img->getClientOriginalExtension();
            $ruta = public_path("storage/refs");
            $img ->move($ruta, $name);
            $farm->url= $name;
        }

        

        $farm->efecto=$req->efect;
        $farm->id_grupo=$req->idGroup; 
        $farm->status=$req->stat;

        $farm->update();
        return redirect('/dbs');
       //return $farm;
    }
    public function stroreRel(Request $req){
        $rel = new relacion();
        $rel->id_farmaco= $req->idFar;
        $id= $req->id;
        $rel->id_bilbio=$req->idBib;
        $rel->save();
        return('/dbs');
        
    }

    public function edit(farmaco $id){
        $grup= grupofarmaco::all();
        //return $id;
        $data= farmaco::find($id);
        //return $data;
        return view('update',compact('grup', 'id', 'data'));
    }
    
}

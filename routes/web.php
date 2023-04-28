<?php

use App\Http\Controllers\biblioController;
use App\Http\Controllers\crudController;
use App\Http\Controllers\farmacoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\grupoController;
use App\Http\Controllers\interactionController;
use App\Models\biblio;
use App\Models\farmaco;
use App\Models\interaccion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('/main', function(){
    return view('main');
});
Route::get('/dbs', function(){
    return view('dbs');
});

Route::controller(grupoController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/dbs', 'index2');
    Route::get('/up', 'create');
    Route::get('/{create}', 'show');
    Route::get('/groups', 'view');
    Route::post('/up', 'store');
    Route::post('/GrupUP', 'updateG');
});

Route::controller(biblioController::class)->group(function(){
    Route::post('/bibUp', 'updateB');
    Route::post('/bib/create', 'storenew');

});
Route::controller(crudController::class)->group(function(){
    Route::post('/rels/saverel', 'storageRel');
    

});
Route::controller(interactionController::class)->group(function(){
    Route::get('/interS', 'view');
    Route::post('/saveInt', 'store');
    Route::post('/inte/new', 'mainStorage');

});

Route::controller(farmacoController::class)->group(function(){
    Route::post('/storeRel', 'updsateFarm');
    Route::post('/savef', 'updateFarm'); 
    Route::post('/farsave', 'store');
});


Route::post('/saveIn',[interactionController::class, 'store']);

Route::get('/inter/{data}',[interactionController::class, 'view'])->name('interS');
Route::get('/bibss/{data}',[biblioController::class, 'viewW'])->name('bibSs');

Route::get('/grups/{data}',[grupoController::class, 'viewE'])->name('groupEd');
Route::get('/bibs/{data}',[biblioController::class, 'view'])->name('bibsEd');

Route::get('/dbs/{id}', [grupoController::class, 'destroy'])->name('farm.del');
Route::get('/group/{id}', [grupoController::class, 'destroyG'])->name('group.del');
Route::get('/bib/{id}', [grupoController::class, 'destroyB'])->name('bib.del');

Route::get('/dbs/{id}/edit', [farmacoController::class, 'edit'])->name('updateFarm');


Route::get('/listaI/{id}', [crudController::class, 'viewc'])->name('InterListado');
Route::get('/rels/new', [crudController::class, 'newr'])->name('newRel');
Route::get('/cons/{id}', [crudController::class, 'consulta'])->name('cons');


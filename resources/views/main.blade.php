@php
    /*
    // Debemos hacer primero la carga de autoload.php
require_once 'vendor/autoload.php';

// Código para conectarse con google
$client = new Google_Client();
$client->setApplicationName({{NOMBRE_DE_APLICACION}});
$client->setDeveloperKey({{LLAVE}});
$service = new Google_Service_Drive($client);
*/
@endphp

<!doctype html>
<html lang="en">
  <head>
    <title>Nutric</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./app.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Nutric</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dbs">datos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relaciones</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{route('newRel')}}">Crear relaciones</a>
                       
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid" style="margin: 20px">
        <div class="row">

            <div class="col-3"></div>

            <div class="col-6">
                
                <div class="card card-body" style="margin-top: 30px">
                    <div class="card-body-text">
                        <h3>Farmaco</h3>
                    </div>

                <form class="form-group" action="/farsave" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre</span>
                        </div>
                     <input class="form-control col-6" type="text" name="nombre" id="" required>   
                     
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Grupo</span required>
                        </div>
                        <select class="form-control col-5" name="idGroup" id="">
                           <option  value="" selected>Select</option>
                           @if (isset($grupos))
                               
                           
                            @foreach ($grupos as $grupo)
                                <option value={{$grupo->id}}>{{$grupo->grupo}}</option>
                            @endforeach
                            @endif
                        </select>
                        <div class="input-group-apend">
                            <a name="" id="" class="btn btn-outline-primary " href="#" role="button" data-toggle="modal" data-target="#Modalgrupo"><strong>+</strong> </a>
                        </div>
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Mecanismos</span>
                        </div>
                        <input class="form-control col-6" type="text" name="meca" id="" required>
                    </div><br>  
                    
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Imagen</span>
                        </div>
                        
                        <input class="form-control col-6" type="file" name="url" id="">
                        
                    </div><br>
                    <label for="efect">Efectos al estado nutricional</label><br>
                    <textarea class="form-control col-5" name="efect" id="" cols="10" rows="5"></textarea>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Estado</span>
                        </div>
                        <!--<select name="stat" id="" class="form-control col-5">
                            <option value="0" selected>Inactivo</option>
                            <option value="1">Activp</option>
                        </select>-->
                        <input type="checkbox" class="form-control" name="stat" checked id="">
                    </div>
                    <hr>
                    <button type="button" name="" id="" class="btn btn-outline-secondary btn-lg btn-block" data-toggle="modal" data-target="#biblioColl">Bibliografia</button>
                    <br><hr>
                    <input type="submit" class="btn btn-success btn-lg btn-block" value="Listo">
                </form>
           
                <button type="button" name="" id="" class="btn btn-outline-info btn-lg btn-block" data-toggle="modal" data-target="#modI">Interacciones</button>
                </div>
                                        

                
                </div>
                
            

            <div class="col-3"></div>

        </div>
        <!--ModalGRupo-->
        <div class="modal fade" id="Modalgrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo Grupo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="form-group" action="/up" method="POST">
                    @csrf
                        <input type="text" required class="form-control" name="grupo" id="" placeholder="Grupo"><br>
                        <input type="text" required class="form-control" name="subgrupo" id=""placeholder="Subgrupo"><br>
                        
                            <select class="form-control " name="estatus" id="">
                                <option value="0" selected>Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                            <label class="" for="status">Staus</label>
                        
                        <hr>
                        <button type="submit" class="btn btn-outline-success btn-block" style="float: right">Listo</button>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
          <!--modal interacciones-->
          <div class="modal" id="biblioColl">
            <div class="card card-body">
                <div class="row">
            <div class="col-6">
                <form action="/bib/create" class="form-group" method="POST">
                    @csrf
                    @method('POST')
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Título</span>
                </div>
                <input class="form-control col-5" type="text" name="titulo" id="">
            </div><br>
            <label for="desc">Descripcion rapida</label>
            <textarea class="form-control col-5" name="desc" id="" cols="10" rows="5"></textarea>
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Autor</span>
                </div>
                <input class="form-control col-4" type="text" name="autor" id="">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Año/publicación</span>
                </div>
                <input class="form-control col-2" type="number" name="anio" id="">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Editorial</span>
                </div>
                <input class="form-control col-5" type="text" name="editorial" id="">
            </div><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Estado</span>
                </div>
                <select class="form-control" name="status" id="">
                    <option value="0" selected>Inactivo</option>
                    <option value="1">Activo</option>
                </select>
            </div><br>
            <input type="submit" class="btn btn-success btn-block" value="Agregar">
        </form>

            </div>
        
        <div class="col-6">
            <table class="table table-hover table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>titulo</th>
                        <th>autor</th>
                        <th>año/piblic</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($bibs as $bib)
                        
                            <tr>
                            <td scope="row">{{$bib->id}} </td>
                            <td>{{$bib->titulo}}</td>
                            <td>{{$bib->autor}}</td>
                            <td>{{$bib->anio}} </td>
                        </tr>
                        @endforeach
                        
                        
            </table>
        </div>
    </div>
    </div>
        
    </form>
    </div><br><hr>
        

    
                            

    
    </div>
        </div>
        <div class="modal fade" id="modI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva Interaccion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="inte/new" class="form-group" method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tipo</span>
                            
                        </div>
                        <input type="text" class="form-control" name="tipo" id="">
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Farmaco</span>
                        </div>
                        <select name="idFarm" class="form-control" multiple  id="">
                            
                            @foreach ($farmacos as $farm)
                                <option value="{{$farm->id}}">{{$farm->farmaco}} </option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nombre/interac</span>
                        </div>
                        <input type="text" class="form-control" name="nombre" id="">
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Recomendaciones</span>
                        </div>
                        <textarea name="recom" id="" class="form-control" cols="10" rows="5"></textarea>
                    </div><br>                 
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Estado</span>
                        </div>
                        <input type="checkbox" class="form-control" name="stat" id="">
                    </div><br>
                  


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success btn-block" value="Listo">
                </div>
            </form>
              </div>
            </div>
          </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
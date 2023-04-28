<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="resources/css/app.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Nutric</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dbs">datos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="{{route('newRel')}}">Crear relaciones</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
      <div class="container">
        <div class="row">
           
                <h3>Datos</h3>
                <div class="card card-body">
                    <h3>Farmacos</h3>
                <table class="table table-hover table-striped table-inverse " style="border-radius: 10px">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Img</th>
                            <th>Farmaco</th>
                            <th>Mecanismo</th>
                            <th>Url</th>
                            <th>Efectos</th>
                            <th>grupo</th>
                            <th>status</th>
                            <th>----</th>
                            <th>----</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($farmacos as $farmaco)                               
                            
                                <tr>
                                
                                <td scope="row">{{$farmaco->id}}</td>
                                <td><img src="/storage/refs/{{$farmaco->url}}" height="40"   alt=""></td>
                                <td>{{$farmaco->farmaco}}</td>
                                <td>{{$farmaco->mecanismo}}</td>
                                <td>{{$farmaco->url}}</td>
                                <td>{{$farmaco->efecto}}</td>
                                <td>{{$farmaco->id_grupo}}</td>
                                <td>{{$farmaco->status}} </td>
                                <td>
                                    <a name="" id="" class="btn btn-success" href="{{route('cons', $farmaco->id)}}" role="button">Ver</a>
                                    <a name="" id="" class="btn btn-danger" href="{{route('farm.del', $farmaco->id)}}" role="button">Delete</a>
                                </td>
                                <td><a name="" id="" class="btn btn-warning" href="{{ route('updateFarm', $farmaco->id) }}" role="button">Edit</a>
                               <!-- <a name="" id="" class="btn btn-outline-info btn-sm" href="{{route('interS', $farmaco->id)}}" role="button" >Interacciones</a>-->
                                <a name="" id="" class="btn btn-outline-info btn-sm" href="{{route('InterListado',$farmaco->id)}}" role="button">Interacciones</a>
                                <a name="" id="" class="btn btn-outline-secondary btn-sm" href="{{route('bibSs', $farmaco->id)}}" role="button">Bibliografia</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                <br><hr>
                <h3>Grupos</h3>
                <table class="table table-hover table-striped table-inverse " style="border-radius: 10px; margin-left: auto">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Grupo</th>
                            <th>Subgrupo</th>
                            <th>satus</th>
                            <th>...</th>
                            <th>...</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)                               
                            <tr>
                                <td scope="row">{{$grupo->id}}</td>
                                
                                <td>{{$grupo->grupo}}</td>
                                <td>{{$grupo->subgrupo}}</td>
                                <td>{{$grupo->status}}</td>
                                <td><a name="" id="" class="btn btn-danger" href="{{route('group.del', $grupo->id)}}" role="button">Delete</a></td>
                                
                                <td><a name="" id="" class="btn btn-warning" href="{{route('groupEd', $grupo->id)}}" role="button">Edit</a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table><br>
                <hr>
                <h3>bibliografias</h3>
                <table class="table table-hover table-striped table-inverse ">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Titúlo</th>
                            <th>Descripcion</th>
                            <th>autor</th>
                            <th>año</th>
                            <th>editorial<th>
                            <th>status</th>
                            <th>---</th>
                            <th>...</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            @if (isset($bibliografias))
                             @foreach ($bibliografias as $bib)                               
                                <tr>
                                    <td scope="row">{{$bib->id}}</td>
                                    <td>{{$bib->titulo}}</td>
                                    <td>{{$bib->descripcion}}</td>
                                    <td>{{$bib->autor}}</td>
                                    <td>{{$bib->anio}}</td>
                                    <td>{{$bib->editorial}}</td>
                                    <td>{{$bib->status}}</td>
                                    <td><a name="" id="" class="btn btn-danger" href="{{route('bib.del', $bib->id)}}" role="button">Delete</a></td>
                                    <td><a name="" id="" class="btn btn-warning" href="{{route('bibsEd', $bib->id)}}" role="button">Edit</a>
                                        
                                    </td>
                                </tr>
                            @endforeach   
                            @endif
                            
                        </tbody>
                </table>
                <br>
                <hr>
                <h3>Interacciones</h3>
                <table class="table table-hover table-striped table-inverse table">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>IdFarmaco</th>
                            <th>Interaccion</th>
                            <th>recomendaciones</th>
                            
                            <th>status</th>
                            <th>---</th>
                            <th>...</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            
                            @if (isset($inters))
                             @foreach ($inters as $inte)                               
                                <tr>
                                    <td scope="row">{{$inte->id}}</td>
                                    <td>{{$inte->tipo_interaccion}}</td>
                                    <td>{{$inte->id_farmaco}}</td>
                                    <td>{{$inte->nombre_interaccion}}</td>
                                    <td>{{$inte->recomendacion}}</td>
                                    <td>{{$inte->status}}</td>
                                    <td><a name="" id="" class="btn btn-danger" href="{{route('farm.del', $inte->id)}}" role="button">Delete</a></td>
                                    
                                    
                                    <td><a name="" id="" class="btn btn-warning" href="#" role="button">Edit</a>
                                        
                                    </td>
                                </tr>
                            @endforeach   
                            @endif
                            
                        </tbody>
                </table>


            </div>
        </div>
        
        <div class="modal fade" id="Mod1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    <table class="table table-hover table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($inters as $int)
                                    
                                    @if ($int)
                                        
                                    @endif
                                    <tr>
                                        <td scope="row">{{$int->id}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>

                </div>
                
              </div>
            </div>

            
          </div>
          <div class="modal fade" id="ModalCons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
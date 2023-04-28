<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
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
    </nav><br>
            
            

    
    
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">

                        <form class="form-group" action="/savef" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{$id->id}}" hidden id="">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                        <input class="form-control col-6" type="text" name="nombre" value="{{$id->farmaco}}" id="">   
                        
                        </div><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Grupo</span>
                            </div>
                            <select class="form-control col-5" name="idGroup" id="">
                            <option  value="Select" selected>----</option>
                            @if (isset($grup))
                                
                            
                                @foreach ($grup as $grupo)
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
                            <input class="form-control col-6" type="text" name="meca" value="{{$id->mecanismo}}" id="">
                        </div><br>  
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Imagenes</span>
                            </div>
                            <!--<input class="form-control col-6" type="file" name="img" id="">
                            <input class="form-control" type="text" name="img" id="" value="" readonly>-->
                            <input type="file" class="form-control" name="url" id="">
                        </div><br>
                        <label for="efect">Efectos al estado nutricional</label><br>
                        <textarea class="form-control col-5" name="efect" id="" cols="10" rows="5">{{$id->efecto}} </textarea>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Estado</span>
                            </div>
                            <select name="stat" id="" class="form-control col-5">
                                <option value="0" selected>Inactivo</option>
                                <option value="1">Activp</option>
                            </select>
                        </div>
                        <hr>
                        


                            
                        <br><hr>
                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Listo">
                        </form>
                    </div>
                    <div class="col-3">
                        <div class="col-3">
                            <img src="/storage/refs/{{$id->url}}" style="margin-left: auto" height="300" alt="">
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
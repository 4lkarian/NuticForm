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


      <div class="container">
        <div class="row">
            
            <div class="col-6">

                <table class="table table-hover table-inverse ">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>Id/Relacion</th>
                            <th>Id/Farmaco</th>
                            <th>Id/Fuente</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($relas as $rel)
                            <tr>
                                <td scope="row">{{$rel->id}} </td>
                                <td>{{$rel->id_farmaco}} </td>
                                <td>{{$rel->id_biblio}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>

            </div>

            <div class="col-6">
                <form action="saverel" class="form-group" method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Farmaco</span>
                        </div>    
                            <select multiple class="form-control" name="idFarm" id="">
                            @foreach ($fam as $farm)
                                
                                <option value="{{$farm->id}}">{{$farm->id}}|{{$farm->farmaco}} </option>
                            
                            @endforeach
                            </select><br>
                           

                    
                        </div><br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Fuente</span>
                            </div>    
                                <select multiple name="idBib" class="form-control" id="">
                                @foreach ($bib as $fuente)
                                    
                                    <option value="{{$fuente->id}}">{{$fuente->id}}|{{$fuente->titulo}} </option>
                                
                                @endforeach
                                </select><br>
                                
                                
                        
                            </div><br>
                            <hr>
                            <input type="submit" class="btn btn-success btn-block" value="Crear Relacion">

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
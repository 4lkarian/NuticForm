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
      <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">

                <form action="/bibUp" class="form-group" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="id" value="{{$data->id}}" hidden id="">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Título</span>
                        </div>
                        <input class="form-control col-5" type="text" value="{{$data->titulo}}" name="titulo" id="">
                    </div><br>
                    <label for="desc">Descripcion rapida</label>
                    <textarea class="form-control col-5" name="desc" id="" cols="10" rows="5">{{$data->descripcion}}</textarea>
                    <br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Autor</span>
                        </div>
                        <input class="form-control col-4" type="text" value="{{$data->autor}}" name="autor" id="">
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Año/publicación</span>
                        </div>
                        <input class="form-control col-2" type="number" value="{{$data->anio}}" name="anio" id="">
                    </div><br>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Editorial</span>
                        </div>
                        <input class="form-control col-5" type="text" value="{{$data->editorial}}" name="editorial" id="">
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
                    <input type="submit" class="btn btn-success btn-block" value="Listo">
                </form>

            </div>
            <div class="col-3"></div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
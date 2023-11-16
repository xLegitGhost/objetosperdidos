<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar objetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

  .barra-busqueda{
      width: 100%;
      margin: 0 auto;
      margin-bottom: 20px;
      border: 1px solid red;
  }
  form {
    display: flex;
    gap: 2em;
  }

    </style>
</head>
<body>
    <?php 
    ?>

    <div class="container">
        
        <br>
                <h1>Listado de objetos perdidos</h1>
                <div class="busqueda">
                    <div class="row">
                        <label for="">Filtrar resultados:</label>
                        <form action="" method="POST">
                            <div class="col-8">         
                                <input class="form-control barra-busqueda" id="myInput" name= "busqueda" type="text" placeholder="Buscar objeto por nombre">
                            </div>
                            <div class="col-4">
                            <input type="submit" value="Buscar" class="btn btn-success" name="search" onsubmit="">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Editorial</th>
                            <th>ISBN</th>
                            <th>N. Pags</th>
                            <th>Autores</th>
                            <th>Clasificacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>
                                        <a href="">
                                        <button class="btn btn-primary">Cambiar estado</button>
                                        </a>
                                    </td>
                                </tr>
                    </tbody>
                </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
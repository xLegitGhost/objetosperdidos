<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar objetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
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

  .btn {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }


    </style>
</head>
<body>
    <?php 
    ?>
    <a href="index.html">
    <img src="assets/logo.png" class="logo" height="120"/>
    </a>
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
                        <?php 
                        if(isset($_POST['search'])){
                            $busqueda = $_POST['busqueda'];
                            echo $busqueda;
                        }
                        ?>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Lugar</th>
                            <th>Fecha de reporte</th>
                            <th>Alumno</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                                
                                    <?php 
                                        require_once '../controllers/mostrarRegistros.php';
                                        $registros = new Registros();
                                        if(isset($busqueda) && $busqueda != null){
                                            $resultado = $registros->getRegistro($busqueda);
                                        }else{
                                            $resultado = $registros->getRegistros();
                                        }
                                        foreach ($resultado as $fila) { ?>
                                        <tr>

                                        <td><?php echo $fila['id'] ?></td>
                                        <td><?php echo $fila['nombre'] ?></td>
                                        <td><?php echo $fila['descripcion'] ?></td>
                                        <td><?php echo $fila['lugar'] ?></td>
                                        <td><?php echo $fila['fecha_reporte'] ?></td>
                                        <td><?php echo $fila['nombre_alumno'] ?></td>
                                        <td><?php echo '<img width="80px" src="data:image/jpeg;base64,' . base64_encode($fila['foto']) . '"/>' ?></td>
                                        <td><?php echo $fila['estado'] ?></td>
                                        <td>
                                            <a href="">
                                            <button class="btn btn-primary">Cambiar estado</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                    </tbody>
                </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
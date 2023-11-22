<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
    session_start();
    include_once '../models/Perdidas.php';
    include_once '../models/Objeto.php';
    include_once '../models/Alumno.php';

    $perdida = new Perdidas();
    $objeto = new Objeto();
    $alumno = new Alumno();
    

    // Obteniendo info para debug
        //$resultado = $alumno->getAlumno("asd");
        //    echo $resultado['nombre'];
        //    echo '<img src="data:image/jpeg;base64,' . base64_encode($resultado['foto']) . '"/>';
    
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar objetos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            
                            $perdida = new Perdidas();

                            $resultado = $perdida->getPerdidasAlumnoObjeto();
                            

                            foreach ($resultado as $perdida) { ?>

                                <tr>
                                    <td><?php echo $perdida['id'] ?></td>
                                    <td><?php echo $perdida['objeto_nombre'] ?></td>
                                    <td><?php echo $perdida['descripcion'] ?></td>
                                    <td><?php echo $perdida['lugar'] ?></td>
                                    <td><?php echo $perdida['fecha_reporte'] ?></td>
                                    <td><?php echo $perdida['alumno_nombre'] ?></td>
                                    <td><?php echo $perdida['estado'] ?></td>
                                    <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarPerdida" ><i class="bi bi-pencil-square"></i> Cambiar estado</button>
                                    </td>
                                </tr>
                                
                            <?php  } 
                            
                            include 'modals/editarPerdida.php'

                            ?>

                    </tbody>
                </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
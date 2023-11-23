<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar objetos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

        <?php
            session_start();


            if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php session_unset(); } ?>

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
                            <input type="submit" value="Todos" class="btn btn-success" name="search" onsubmit="">
                            <input type="submit" value="Perdido" class="btn btn-danger" name="sperdido">
                            <input type="submit" value="Encontrado" class="btn btn-warning" name="sencontrado">
                            <input type="submit" value="Recuperado" class="btn btn-secondary" name="sRecogido">
                            </div>
                        </form>
                        <?php 
                        if(isset($_POST['search'])){
                            $busqueda = $_POST['busqueda'];
                        }
                        if(isset($_POST['sperdido'])){
                            $filtro = $_POST['sperdido'];
                        }
                        if(isset($_POST['sencontrado'])){
                            $filtro = $_POST['sencontrado'];
                        }
                        if(isset($_POST['sRecogido'])){
                            $filtro = $_POST['sRecogido'];
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

                                        if (isset($filtro)){
                                            $resultado = $registros->getRegistroEstado($filtro);
                                        }
                                        foreach ($resultado as $fila) { ?>
                                        <tr>

                                        <td><?php echo $fila['id'] ?></td>
                                        <td><?php echo $fila['nombre'] ?></td>
                                        <td><?php echo $fila['descripcion'] ?></td>
                                        <td><?php echo $fila['lugar'] ?></td>
                                        <td><?php echo $fila['fecha_reporte'] ?></td>
                                        <td><?php echo $fila['nombre_alumno'] ?></td>
                                        <?php 
                                        if($fila['foto'] != null){
                                            echo "<td><img src='data:image/png;base64,".base64_encode($fila['foto'])."' width='100px' height='80px' ></td>";
                                        }else{
                                            echo "<td>No hay imagen disponible</td>";}
                                        ?>
                                        <td><?php echo $fila['estado'] ?></td>
                                        <?php if(!($fila['estado'] == 'Recuperado')){ ?>
                                            <td>
                                            <a href="../controllers/editarPerdida.php?id=<?php echo $fila['id'] ?>&estado=<?php echo $fila['estado'] ?>">
                                            <button type="button" class="btn btn-primary"> <i class="bi bi-pen-fill"></i> Cambiar estado</button>
                                            </a>
                                        </td>
                                        <?php } else { ?>
                                            <td>
                                            <a href="../controllers/editarPerdida.php?id=<?php echo $fila['id'] ?>&estado=<?php echo $fila['estado'] ?>">
                                            <button type="button" class="btn btn-secondary"> <i class="bi bi-binoculars-fill"></i> Ver detalles</button>
                                            </a>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                    </tbody>
                </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando perdida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>

  form {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

  }

  .btn {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }

  .inputs{
    width: 50%;
  }


    </style>
</head>
<body>
    
  <div class="container">
    
                <?php 
                    session_start();

                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        include_once '../controllers/mostrarRegistros.php';
                        include_once '../models/Perdidas.php';
                        $registros = new Registros();
                        $perdidas = new Perdidas();
                        $resultado = $registros->getInfoRegistro($id);
                        foreach($resultado as $dato){
                            $nombre = $dato['nombre'];
                            $descripcion = $dato['descripcion'];
                            $lugar = $dato['lugar'];
                            $fecha = $dato['fecha_reporte'];
                            $nombre_alumno = $dato['nombre_alumno'];
                            $estado = $dato['estado'];
                            $foto = $dato['foto'];
                        }

                        date_default_timezone_set('America/Mexico_City');
                        $tiempo_en_segundos = time();
                        $fecha_actual = date("d-m-Y h:i:s", $tiempo_en_segundos);

                        if(isset($_POST['cambiarEstado'])){
                            $estado = $_POST['estado'];
                            $nc_alumno_encontro = $_POST['alumno_nc_encontro'];
                            $fecha_update = $fecha_actual;

                            $queryChangeState = $perdidas->cambiarEstado($id, $estado, $nc_alumno_encontro);
                        }
                    }
                ?>

                    <!-- Formulario del modal -->
                    <div class="form-container">
                        <form action="" method="POST">
                        <h1 class="modal-title mb-3" id="editarPerdidaLabel">Editando la perdida</h1>
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Importante</h4>
                            <p>Estas editando una perdida de el alumno <strong><?php echo $dato['nombre_alumno'] ?></strong>, debes cambiar su estado <strong><?php echo $dato['estado'] ?></strong> a el caso que corresponda.</p>
                            <p>Si el Alumno que encontró el objeto, o lo recogió no se encuentra en la base de datos de Alumnos, debes registrarlo <a href="../view/agregarObjeto.php">aquí</a></p>
                            <hr>
                            <h5>Informacion adicional acerca de la perdida de <strong><?php echo $dato['nombre_alumno'] ?></strong>:</h5>
                            <p class="mb-0">Nombre: <strong><?php echo $dato['nombre'] ?></strong></p>
                            <p class="mb-0">Descripcion: <strong><?php echo $dato['descripcion'] ?></strong></p>
                            <p class="mb-0">Lugar: <strong><?php echo $dato['lugar'] ?></strong></p>
                            <p class="mb-0">Fecha de reporte: <strong><?php echo $dato['fecha_reporte'] ?></strong></p>
                            <p class="mb-0">Estado: <strong><?php echo $dato['estado'] ?></strong></p>
                            <hr>
                            <h5>Informacion sobre los cambios de la perdida:</h5>
                            <?php
                            $alumno_2 = $registros->getInfoAlumno($dato['alumno_nc_encontro']);

                            

                            if($dato['alumno_nc_encontro'] == NULL){
                                $alumno_2['nombre'] = "Nadie";
                                $dato['fecha_update'] = "No ha sido reportado";
                            }else{
                                switch ($dato['estado']) {
                                    case 'Encontrado':
                                        $aux1 = "encontrar";
                                        break;
                                    case 'Recuperado':
                                        $aux1 = "recoger";
                                        break;
                                    default:
                                        break;
                                }
                            }

                            if(isset($aux1)){?>
                                <p class="mb-0">Último alumno en <strong><?php echo $aux1 ?></strong> del objeto: <strong><?php echo $alumno_2['nombre'] . ' ' . $alumno_2['grado'] . $alumno_2['grupo']; ?></strong></p>
                            <?php }else {
                                echo "<p class='mb-0'>Último alumno en actualizar el estado del objeto: <strong>Nadie</strong></p>";
                            } ?>
                            
                            <p class="mb-0">Fecha de actualización: <strong><?php echo $dato['fecha_update'] ?></strong></p>
                        </div>

                            <div class="inputs">
                                <h3 class="text-center">Cambia los datos</h3>
                                <div class="form-floating mb-2">
                                    <select class="form-select" aria-label="Default select example" name="estado">
                                        <option value="Perdido">Perdido</option>
                                        <option value="Encontrado">Encontrado</option>
                                        <option value="Recuperado">Recuperado</option>
                                    </select>
                                    <label for="floatingInput">Estado</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" name="alumno_nc_encontro" class="form-control" id="floatingInput" placeholder="" required>
                                    <label for="floatingInput">N. Control del alumno que reporta: </label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input class="form-control" type="text" name="fecha_update" id="floatingInput" value="<?php echo $fecha_actual; ?>" aria-label="Disabled input example" disabled>
                                    <label for="floatingInput">Fecha de actualización</label>
                                </div>
                            </div>   

                                <div class="form-footer">
                                    <a href="../view/objetos.php"><button type="button" class="btn btn-danger">Volver</button></a>
                                    <button type="submit" name="cambiarEstado" class="btn btn-success">Guardar cambios</button>
                                </div>
                        </form>
                    </div>    
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
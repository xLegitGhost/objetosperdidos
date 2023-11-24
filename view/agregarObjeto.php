<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de objetos perdidos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <style>
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
        .form-container {
            text-align: left;
            margin-top: 20px;
        }

        .form-container label {
            font-weight: bold;

        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-floating label {
            font-weight: normal;
        }

        .btn {
            margin-top: 20px;
        }



    </style>
</head>
<body>
    <?php 
        session_start();
        
        include_once '../models/Alumno.php';

        $alumno = new Alumno();

    ?>
        
    <a href="index.html">
    <img src="assets/logo.png" class="logo" height="120"/>
    </a>

    <div class="container seleccion">
        <h1>Selecciona una opción correspondiente:</h1>

        <?php
            if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php session_unset(); } ?>

            <?php
                if(isset($_POST['registrarAlumno'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    ¡Muy bien, has registrado un Alumno!
                    Ahora puedes registrar un objeto perdido.
                </div>
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nuevoObjeto" ><i class="bi bi-person-check"></i> Registrar objeto</button>

                <?php }else { ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoAlumno"><i class="bi bi-person-add"></i> Nuevo alumno</button>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#nuevoObjeto" ><i class="bi bi-person-check"></i> Alumno existente</button>
                <?php } ?>
            

    </div>

    <?php
        if(isset($_POST['registrarAlumno'])){

            $num_control = $_POST['num_control'];
            $nombre = $_POST['nombre'];
            $grado = $_POST['grado'];
            $grupo = $_POST['grupo'];
            $foto = $_FILES['foto'];

            $alumno->alumnoExiste($num_control);

            if(!$alumno->alumnoExiste($num_control)){
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                    // Se subió la foto
                    $alumno->altaAlumno($num_control, $nombre, $grado, $grupo, $foto);
                } else {
                    // No se subió la foto
                    $alumno->altaAlumno($num_control, $nombre, $grado, $grupo, null);
                    $_SESSION['message'] = 'Alumno registrado exitosamente.';
                    $_SESSION['message_type'] = 'success';

                }

                
                
            }

        }

    
    ?>

    <?php include 'modals/usuarioExistente.php'; ?>
    <!-- Modal para nuevo usuario -->
    <div class="modal fade" id="nuevoAlumno" tabindex="-1" aria-labelledby="nuevoAlumnoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevoAlumnoLabel">Ingresa datos del alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario del modal nuevo usuario -->
                    <div class="form-container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" name="num_control" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Numero de control</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre del alumno</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="grado" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Grado</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="grupo" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Grupo</label>
                            </div>   
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Foto del alumno (Opcional)</label>
                                <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file" accept="image/*">
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success" name="registrarAlumno">Registrar alumno</button>
                            </div>
                        </form>
                    </div>
                    <!-- Formulario del modal nuevo usuario -->
                </div>
                </div>
            </div>
    </div>
    

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
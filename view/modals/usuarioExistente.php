    <?php 
    include_once '../models/Objeto.php';
    include_once '../models/Perdidas.php';
    $objeto = new Objeto();
    $perdidas = new Perdidas();

    date_default_timezone_set('America/Mexico_City');
        $tiempo_en_segundos = time();
        $fecha_actual = date("d-m-Y h:i:s", $tiempo_en_segundos);

    if(isset($_POST['registrarObjeto'])){

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $lugar = $_POST['lugar'];
        $alumno_num_control = $_POST['alumno_num_control'];
        $estados_estado = "Perdido";
        
    
        $objeto->existeAlumno($alumno_num_control);
        if($objeto->existeAlumno($alumno_num_control)){
            $ultimoId = $objeto->altaObjeto($nombre, $descripcion, $lugar, $alumno_num_control, $estados_estado);
            $perdidas->altaPerdida($alumno_num_control, $ultimoId, $estados_estado, null);
        }
    }

    
    ?>
    
    <!-- Modal para usuario existente -->
    <div class="modal fade" id="nuevoObjeto" tabindex="-1" aria-labelledby="nuevoObjetoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="nuevoObjetoLabel">Ingresa datos del objeto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario del modal nuevo usuario -->
                    <div class="form-container">
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre del objeto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="descripcion" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Descripcion del objeto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="lugar" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Lugar donde se perdió</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="floatingInput" value="<?php echo $fecha_actual; ?>" aria-label="Disabled input example" disabled>
                                <label for="floatingInput">Fecha de reporte</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="alumno_num_control" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">N. Control del alumno que lo perdió</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="estados_estado" type="text" id="floatingInput" value="Perdido" aria-label="Disabled input example" disabled>
                                <label for="floatingInput">Estado</label>
                            </div>     


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" name="registrarObjeto" class="btn btn-success">Registrar alumno</button>
                            </div>
                        </form>
                    </div>
                    <!-- Formulario del modal nuevo usuario -->
                </div>
                </div>
            </div>
    </div>
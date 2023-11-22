
    <!-- Modal para editar estado en la perdida -->
    <div class="modal fade" id="editarPerdida" tabindex="-1" aria-labelledby="editarPerdidaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarPerdidaLabel">Editar la perdida</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php 

                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    include_once '../controllers/mostrarRegistros.php';
                    $registros = new Registros();
                    $resultado = $registros->getInfoRegistro($id);
                }
                

                
                ?>
                <div class="modal-body">
                    <!-- Formulario del modal -->
                    <div class="form-container">
                        <form action="" method="POST">
                        <div class="alert alert-warning" role="alert">
                            <h4 class="alert-heading">Importante</h4>
                            <p>Estas editando una perdida de el alumno <?php echo $id ?><strong>Alumno</strong>, debes cambiar el estado Perdido a el caso que corresponda.</p>
                            <p>Si el Alumno que encontró el objeto, o lo recogió no se encuentra en la base de datos de Alumnos, debes registrarlo <a href="agregarObjeto.php">aquí</a></p>
                            <hr>
                            <h5>Informacion adicional:</h5>
                            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                        </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre del objeto</label>
                            </div>   


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" name="cambiarEstado" class="btn btn-success">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                    <!-- Formulario del modal nuevo usuario -->
                </div>
                </div>
            </div>
    </div>
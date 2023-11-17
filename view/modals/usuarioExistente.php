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
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" name="num_control" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Nombre del objeto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Descripcion del objeto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="grado" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Lugar donde se perdió</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="floatingInput" value="<?php echo date("d-m-Y"); ?>" aria-label="Disabled input example" disabled>
                                <label for="floatingInput">Fecha de reporte</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="grupo" class="form-control" id="floatingInput" placeholder="" required>
                                <label for="floatingInput">Alumno que lo perdió: </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="floatingInput" value="Perdido" aria-label="Disabled input example" disabled>
                                <label for="floatingInput">Estado</label>
                            </div>     


                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success">Registrar alumno</button>
                            </div>
                        </form>
                    </div>
                    <!-- Formulario del modal nuevo usuario -->
                </div>
                </div>
            </div>
    </div>
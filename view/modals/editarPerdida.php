
    <!-- Modal para editar estado en la perdida -->
    <div class="modal fade" id="editarPerdida" tabindex="-1" aria-labelledby="editarPerdidaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarPerdidaLabel">Ingresa detalles</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario del modal -->
                    <div class="form-container">
                        <form action="" method="POST">
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
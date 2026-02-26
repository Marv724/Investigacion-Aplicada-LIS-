<?php if (isset($editarReserva)): ?>

    <div class="modal fade show" id="pantallaEditar" style="display:block; background:rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Editar Reserva</h5>
                    <a href="/Investigacion-Aplicada/" class="btn-close"></a>
                </div>

                <form method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <input class="form-control mb-2" name="nombre" value="<?= $editarReserva['nombre'] ?>" required>

                        <input class="form-control mb-2" name="direccion" value="<?= $editarReserva['direccion'] ?>"
                            required>

                        <input type="text" class="form-control mb-3" name="telefono"
                            value="<?= $editarReserva['telefono'] ?>" maxlength="8" inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="[0-9]{8}" required>

                        <select class="form-control mb-2" name="evento">
                            <option <?= $editarReserva['evento'] == "Boda" ? "selected" : "" ?>>Boda</option>
                            <option <?= $editarReserva['evento'] == "Cumpleaños" ? "selected" : "" ?>>Cumpleaños</option>
                            <option <?= $editarReserva['evento'] == "Conferencia" ? "selected" : "" ?>>Conferencia</option>
                        </select>

                        <input type="number" class="form-control mb-2" name="personas"
                            value="<?= $editarReserva['personas'] ?>" min="1" max="150" required>

                        <input type="date" class="form-control mb-2" name="fecha" value="<?= $editarReserva['fecha'] ?>"
                            required>

                        <input type="time" class="form-control mb-2" name="inicio" value="<?= $editarReserva['inicio'] ?>"
                            required>

                        <input type="time" class="form-control mb-2" name="fin" value="<?= $editarReserva['fin'] ?>"
                            required>

                        <div class="input-group mb-2">
                            <span class="input-group-text">$</span>
                            <input type="number" name="pago" value="<?= $editarReserva['pago'] ?>" step="0.01"
                                class="form-control" required>
                        </div>

                        <textarea class="form-control mb-2"
                            name="requerimientos"><?= $editarReserva['requerimientos'] ?></textarea>

                        <input type="file" class="form-control mb-2" name="documento">

                    </div>

                    <div class="modal-footer">
                        <a href="/Investigacion-Aplicada/" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" name="editar" value="<?= $editando ?>">
                            Guardar Cambios
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

<?php endif; ?>
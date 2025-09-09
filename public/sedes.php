<?php include '../backend/includes/header.inc.php'; ?>


<h1>Sedes de la ONG</h1>

<!-- Botón para agregar una sede -->
<button class="btn btn-primary" id="btnAgregarSede">Agregar Sede</button>

<!-- Tabla de sedes -->
<table class="table table-bordered table-striped" id="tablaSedes">
    <thead>
        <tr>
            <th>Código</th>
            <th>Ciudad</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Director</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se cargan las sedes con JS -->
    </tbody>
</table>

<!-- Modal para agregar/editar sede -->
<div class="modal fade" id="modalSede" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar / Editar Sede</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formSede">
                    <input type="hidden" id="cod_sede">
                    <div class="mb-3">
                        <label>Ciudad</label>
                        <input type="number" class="form-control" id="cod_ciudad" required>
                    </div>
                    <div class="mb-3">
                        <label>Dirección</label>
                        <input type="text" class="form-control" id="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" id="telefono" required>
                    </div>
                    <div class="mb-3">
                        <label


  <?php include '../backend/includes/footer.inc.php'; ?>

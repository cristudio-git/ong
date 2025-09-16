<?php include '../backend/includes/header.inc.php'; ?>

  <main class="container flex-grow-1 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="display-6">Sedes</h1>
      <button class="btn btn-success" id="btnAgregar">Agregar Sede</button>
    </div>
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
                        <label>Director</label>
                        <input type="number" class="form-control" id="cod_director" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
            </div>
        </div>
    </div>
</div>
  <?php include '../backend/includes/footer.inc.php'; ?>

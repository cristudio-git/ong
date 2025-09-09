
  <?php include '../includes/header.inc.php'; ?>

  <main class="container flex-grow-1 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="display-6">Proyectos</h1>
      <button class="btn btn-success" id="btnAgregar">Agregar proyecto</button>
    </div>

    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-striped m-0" id="tablaProyecto">
          <thead class="table-light">
            <tr>
              <th>Codigo</th>
              <th>Titulo</th>
              <th>Fecha inicio</th>
              <th>Fecha fin</th>
              <th>Presupuesto asignado</th>
              <th>Codigo responsable</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- MODAL -->
  <div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Proyecto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="form-proyecto" enctype="multipart/form-data">
            <!-- Hidden para enviar al backend -->
            <input type="hidden" id="cod_proyecto">

            <!-- Solo para mostrar al usuario -->
            <div class="mb-3">
              <label>Código del proyecto</label>
              <input type="text" id="cod_proyecto_visible" class="form-control" readonly>
            </div>

            <div class="mb-3">
              <label>Titulo</label>
              <input type="text" id="titulo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Fecha inicio</label>
              <input type="date" id="fecha_inicio" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Fecha fin</label>
              <input type="date" id="fecha_fin" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Presupuesto asignado</label>
              <input type="number" id="presupuesto_asignado" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Nombre responsable</label>
              <input type="text" id="nombre_responsable" class="form-control" required>
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include '../includes/footer.inc.php'; ?>




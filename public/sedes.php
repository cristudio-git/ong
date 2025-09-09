<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sedes ONG</title>
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body class="d-flex flex-column min-vh-100">
  <?php include '../includes/header.inc.php'; ?>

  <h1 class="mb-4 display-6">Sede ONG</h1>
  <button class="btn btn-success mb-3" id="btnAgregar">Agregar sede</button>
  <table class="table table-striped" id="tablaSede">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ciudad</th>
        <th>Dirección</th>
        <th>Telefono</th>
        <th>Director</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <div class="modal fade" id="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Sede</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="form-sede" enctype="multipart/form-data">
            <input type="hidden" id="cod_sede">
            <div class="mb-3">
              <label>Ciudad</label>
              <input type="text" id="cod_ciudad" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Dirección</label>
              <input type="text" id="direccion" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Telefono</label>
              <input type="number" id="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Director</label>
              <input type="text" id="cod_director" class="form-control" required>
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

  <script src="js/index.js"></script>
  <script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

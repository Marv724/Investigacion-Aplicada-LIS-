<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservaciones Restaurante</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Estilo inspirado en el sitio de La Pampa Restaurantes */
body {
    font-family: 'Arial', sans-serif;
    background: #fff;
    margin: 0;
    padding: 0;
}
.header {
    background-image: url('https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg');
    background-size: cover;
    background-position: center;
    height: 240px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.header h1 {
    font-size: 3rem;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
}
.navbar-custom {
    background: #333;
}
.navbar-custom a {
    color: white;
}
.content-section {
    padding: 40px 20px;
}
.form-card {
    background: #fafafa;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    padding: 20px;
}
.btn-reservar {
    background: #d9534f;
    color: white;
    font-weight: bold;
}
.btn-reservar:hover {
    background: #c9302c;
    color: white;
}
.table-responsive {
    margin-top: 20px;
}
.footer {
    background: #222;
    color: white;
    text-align: center;
    padding: 15px 0;
}
</style>
</head>
<body>

<!-- HEADER / HERO -->
<div class="header text-center">
    <h1>Reserva tu Mesa</h1>
</div>

<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="#">Restaurante</a>
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      ☰
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Reservar</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="container content-section">

    <?php if(isset($mensaje)): ?>
        <div class="alert alert-success text-center"><?= $mensaje ?></div>
    <?php endif; ?>

    <div class="row">

        <!-- FORMULARIO -->
        <div class="col-md-4">
            <div class="form-card">
                <h3 class="text-center">Haz tu Reservación</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-reservar w-100">Guardar</button>
                </form>
            </div>
        </div>

        <!-- TABLA DE RESERVACIONES -->
        <div class="col-md-8">
            <div class="table-responsive">
                <h3 class="text-center">Reservaciones Registradas</h3>
                <table class="table table-hover">
                    <thead class="table-dark text-white">
                        <tr><th>#</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Fecha</th></tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    &copy; <?= date("Y") ?> Restaurante Demo
</div>

</body>
</html>
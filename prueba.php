separame este codigo en html , php y css <?php
session_start();

if (!isset($_SESSION['reservas'])) {
    $_SESSION['reservas'] = [];
}

/* CREAR */
if (isset($_POST['crear'])) {

    $archivo = "";
    if (!empty($_FILES['documento']['name'])) {
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }
        $archivo = time() . "_" . $_FILES['documento']['name'];
        move_uploaded_file($_FILES['documento']['tmp_name'], "uploads/" . $archivo);
    }

    $_SESSION['reservas'][] = [
        "nombre" => $_POST['nombre'],
        "direccion" => $_POST['direccion'],
        "telefono" => $_POST['telefono'],
        "evento" => $_POST['evento'],
        "personas" => $_POST['personas'],
        "fecha" => $_POST['fecha'],
        "inicio" => $_POST['inicio'],
        "fin" => $_POST['fin'],
        "pago" => $_POST['pago'],
        "requerimientos" => $_POST['requerimientos'],
        "documento" => $archivo
    ];
}

/* ELIMINAR */
if (isset($_GET['eliminar'])) {
    unset($_SESSION['reservas'][$_GET['eliminar']]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Altavista Eventos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background:#f3f5f7;
}

/* HERO */
.hero img {
    height: 320px;
    object-fit: cover;
    filter: brightness(65%);
}

/* SECCIONES */
.section {
    padding: 60px 20px;
}

/* CARD */
.card-modern {
    background:white;
    border-radius:14px;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    padding:25px;
}

/* GALERIA */
.gallery img {
    height:220px;
    object-fit:cover;
    border-radius:14px;
}

/* TABLA */
table th, table td {
    white-space: nowrap;
    font-size: 0.9rem;
}

/* FOOTER */
.footer {
    background:#111;
    color:#bbb;
    text-align:center;
    padding:20px;
}
</style>
</head>

<body>

<!-- HERO -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner hero">
<div class="carousel-item active">
<img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg" class="w-100">
<div class="carousel-caption">
<h1>Altavista Eventos</h1>
<p>Momentos inolvidables</p>
</div>
</div>
<div class="carousel-item">
<img src="https://images.pexels.com/photos/169198/pexels-photo-169198.jpeg" class="w-100">
</div>
<div class="carousel-item">
<img src="https://images.pexels.com/photos/587741/pexels-photo-587741.jpeg" class="w-100">
</div>
</div>
</div>

<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
<div class="container">
<a class="navbar-brand">Altavista</a>
<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">☰</button>
<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="#empresa">Empresa</a></li>
<li class="nav-item"><a class="nav-link" href="#galeria">Galería</a></li>
<li class="nav-item"><a class="nav-link" href="#reservas">Reservas</a></li>
<li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
</ul>
</div>
</div>
</nav>

<!-- EMPRESA -->
<section id="empresa" class="section container">
<h2>Sobre Nosotros</h2>
<p>
Altavista Eventos es una empresa ficticia dedicada al alquiler de espacios
para bodas, cumpleaños y eventos corporativos en El Salvador.
</p>
</section>

<!-- GALERÍA -->
<section id="galeria" class="section bg-light">
<div class="container">
<h2 class="text-center mb-4">Galería</h2>
<div id="galeriaCarousel" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner gallery">
<div class="carousel-item active">
<div class="row g-3">
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/265947/pexels-photo-265947.jpeg"></div>
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/169198/pexels-photo-169198.jpeg"></div>
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/587741/pexels-photo-587741.jpeg"></div>
</div>
</div>
<div class="carousel-item">
<div class="row g-3">
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg"></div>
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/265920/pexels-photo-265920.jpeg"></div>
<div class="col-md-4"><img class="w-100" src="https://images.pexels.com/photos/587742/pexels-photo-587742.jpeg"></div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- FORMULARIO -->
<section id="reservas" class="section container">
<h2 class="mb-4 text-center">Reserva tu Evento</h2>

<div class="row justify-content-center mb-5">
<div class="col-md-8">
<div class="card-modern">

<form method="POST" enctype="multipart/form-data">

<h5>Datos del Responsable</h5>
<input class="form-control mb-2" name="nombre" placeholder="Nombre completo"
pattern="[A-Za-zÁÉÍÓÚáéíóú ]{5,}" required>

<input class="form-control mb-2" name="direccion" placeholder="Dirección" required>

<input class="form-control mb-3" name="telefono" placeholder="Teléfono"
pattern="[0-9]{8}" title="8 dígitos" required>

<h5>Detalles del Evento</h5>
<select class="form-control mb-2" name="evento" required>
<option>Boda</option>
<option>Cumpleaños</option>
<option>Conferencia</option>
</select>

<input type="number" class="form-control mb-2" name="personas"
placeholder="Cantidad de personas" required>

<input type="date" class="form-control mb-3" name="fecha" required>

<h5>Horarios</h5>
<input type="time" class="form-control mb-2" name="inicio" required>
<input type="time" class="form-control mb-3" name="fin" required>

<h5>Pago</h5>
<input class="form-control mb-3" name="pago" placeholder="Pago inicial / Tarjeta" required>

<h5>Requerimientos Especiales</h5>
<textarea class="form-control mb-3" name="requerimientos"></textarea>

<h5>Documentación</h5>
<input type="file" class="form-control mb-3" name="documento">

<button class="btn btn-danger w-100" name="crear">Registrar Reserva</button>
</form>

</div>
</div>
</div>

<!-- TABLA -->
<div class="row">
<div class="col-12">
<div class="table-responsive">
<table class="table table-bordered table-hover align-middle">
<thead class="table-dark">
<tr>
<th>Nombre</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Evento</th>
<th>Personas</th>
<th>Fecha</th>
<th>Inicio</th>
<th>Fin</th>
<th>Pago</th>
<th>Requerimientos</th>
<th>Documento</th>
<th>Acción</th>
</tr>
</thead>
<tbody>

<?php foreach ($_SESSION['reservas'] as $i => $r): ?>
<tr>
<td><?= $r['nombre'] ?></td>
<td><?= $r['direccion'] ?></td>
<td><?= $r['telefono'] ?></td>
<td><?= $r['evento'] ?></td>
<td><?= $r['personas'] ?></td>
<td><?= $r['fecha'] ?></td>
<td><?= $r['inicio'] ?></td>
<td><?= $r['fin'] ?></td>
<td><?= $r['pago'] ?></td>
<td><?= $r['requerimientos'] ?></td>
<td>
<?php if ($r['documento']): ?>
<a href="uploads/<?= $r['documento'] ?>" target="_blank">Ver</a>
<?php else: ?>—<?php endif; ?>
</td>
<td>
<a href="?eliminar=<?= $i ?>" class="btn btn-sm btn-danger">Eliminar</a>
</td>
</tr>
<?php endforeach; ?>

</tbody>
</table>
</div>
</div>
</div>

</section>

<!-- CONTACTO -->
<section id="contacto" class="section bg-dark text-white">
    <div class="container">
    <div class="row align-items-center">
    
    <!-- INFO CONTACTO -->
    <div class="col-md-6 mb-4">
        <h2>Contacto</h2>
        <p>📍 San Salvador, El Salvador</p>
        <p>📞 +503 2222-3333</p>
        <p>✉️ contacto@altavistaeventos.com</p>
    
        <p class="mt-3">
            Visítanos para conocer nuestros espacios y recibir asesoría
            personalizada para tu evento.
        </p>
    </div>
    
    <!-- MAPA -->
    <div class="col-md-6">
        <div class="ratio ratio-16x9">
            <iframe
                src="https://www.google.com/maps?q=San+Salvador+El+Salvador&output=embed"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
    
    </div>
    </div>
    </section>

<footer class="footer">
© 2026 Altavista Eventos
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

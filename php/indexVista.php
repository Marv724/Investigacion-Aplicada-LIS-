<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Altavista Eventos</title>
<link rel="stylesheet" href="public/estilos.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2 class="text-center">Reservas</h2>

<form method="POST" action="index.php?action=crear" enctype="multipart/form-data">
    <input name="nombre" class="form-control mb-2" placeholder="Nombre" required>
    <input name="direccion" class="form-control mb-2" placeholder="Dirección" required>
    <input name="telefono" class="form-control mb-2" placeholder="Teléfono" required>
    <button class="btn btn-danger">Guardar</button>
</form>

<table class="table mt-4">
<tr>
    <th>Nombre</th>
    <th>Acción</th>
</tr>

<?php foreach ($reservas as $i => $r): ?>
<tr>
    <td><?= $r['nombre'] ?></td>
    <td>
        <a href="index.php?action=eliminar&id=<?= $i ?>" class="btn btn-sm btn-danger">
            Eliminar
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>

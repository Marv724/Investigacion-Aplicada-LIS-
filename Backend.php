<?php
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

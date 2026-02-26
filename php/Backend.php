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

    ValidarFormato();

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

    header("Location: Principal.php");
    exit();
}

/* ELIMINAR */
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar'];

    if (isset($_SESSION['reservas'][$indice])) {
        unset($_SESSION['reservas'][$indice]);
        $_SESSION['reservas'] = array_values($_SESSION['reservas']);
    }
    header("Location: Principal.php");
    exit();
}

/* EDITAR */
if (isset($_POST['editar'])) {
    $indice = $_POST['editar'];

    if (isset($_SESSION['reservas'][$indice])) {
        $archivo = $_SESSION['reservas'][$indice]['documento'];

        if (!empty($_FILES['documento']['name'])) {
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            $archivo = time() . "_" . $_FILES['documento']['name'];
            move_uploaded_file($_FILES['documento']['tmp_name'], "uploads/" . $archivo);
        }

        ValidarFormato();

        $_SESSION['reservas'][$indice] = [
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
    echo "<script>window.location='Principal.php';</script>";
    exit();
}

function PantallaEditar(){
    
}

function ValidarFormato()
{
    $errores = [];

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $_POST['nombre'])) {
        $errores[] = "Nombre inválido";
    }

    if (!preg_match("/^[0-9]{8}$/", $_POST['telefono'])) {
        $errores[] = "Teléfono inválido";
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header("Location: Principal.php");
        exit();
    }

    if (
        !filter_var($_POST['personas'], FILTER_VALIDATE_INT) ||
        $_POST['personas'] <= 0 ||
        $_POST['personas'] > 150
    ) {

        $errores[] = "La cantidad debe ser un número entre 1 y 150.";
    }

    if ($_POST['inicio'] == $_POST['fin']) {
        $errores[] = "La hora de inicio y fin no pueden ser iguales.";
    }

    $horaInicio = strtotime($_POST['inicio']);
    $horaFin = strtotime($_POST['fin']);

    if ($horaFin <= $horaInicio) {
        $errores[] = "La hora de fin debe ser mayor que la hora de inicio.";
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        header("Location: Principal.php");
        exit();
    }

}
<?php
require_once 'models/Reserva.php';

class ReservaController {

    public function index() {
        Reserva::iniciar();
        $reservas = Reserva::obtenerTodas();
        require 'views/reservas/index.php';
    }

    public function crear() {

        $archivo = "";

        if (!empty($_FILES['documento']['name'])) {
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }

            $archivo = time() . "_" . $_FILES['documento']['name'];
            move_uploaded_file($_FILES['documento']['tmp_name'], "uploads/" . $archivo);
        }

        Reserva::crear([
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
        ]);

        header("Location: index.php");
    }

    public function eliminar() {
        Reserva::eliminar($_GET['id']);
        header("Location: index.php");
    }
}

<?php

class Reserva {

    public static function iniciar() {
        if (!isset($_SESSION['reservas'])) {
            $_SESSION['reservas'] = [];
        }
    }

    public static function crear($data) {
        $_SESSION['reservas'][] = $data;
    }

    public static function eliminar($id) {
        unset($_SESSION['reservas'][$id]);
    }

    public static function obtenerTodas() {
        return $_SESSION['reservas'];
    }
}

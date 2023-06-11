<?php
function conectar_db() {
    $db = mysqli_connect('localhost', 'root', '', 'databasephp');

    if (!$db) {
        echo 'No se pudo conectar a la base de datos';
        exit;
    }

    return $db;
}

function obtener_datos_habitacion() {
    try {
        require 'database.php';

        $sql = "SELECT * FROM habitacion";

        $consulta = mysqli_query($db, $sql);

        return $consulta;

        mysqli_close($db);
    } catch (\Throwable $th) {
        echo('<pre>');
        var_dump($th);
        echo('</pre>');
    }
}

function obtener_datos_reserva() {
    try {
        require 'database.php';

        $sql = "SELECT * FROM reserva";

        $consulta = mysqli_query($db, $sql);

        return $consulta;

        mysqli_close($db);
    } catch (\Throwable $th) {
        echo('<pre>');
        var_dump($th);
        echo('</pre>');
    }
}
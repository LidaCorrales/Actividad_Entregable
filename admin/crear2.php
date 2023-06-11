<?php
require 'C:\xampp\htdocs\actividad_entregable\includes\funciones.php';

$bd = conectar_db();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se está enviando el formulario de creación de reserva
        $id_habitacion = $_POST['id_habitacion'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];

        if (empty($id_habitacion)) {
            $errores[] = 'El ID de habitación es obligatorio';
        }
        
        if (empty($fecha_inicio)) {
            $errores[] = 'La fecha de inicio es obligatoria';
        }
        if (empty($fecha_fin)) {
            $errores[] = 'La fecha de fin es obligatoria';
        }

        if (empty($errores)) {
            // Escapar los valores para prevenir inyección de SQL
            $id_habitacion = mysqli_real_escape_string($bd, $id_habitacion);
            $fecha_inicio = mysqli_real_escape_string($bd, $fecha_inicio);
            $fecha_fin = mysqli_real_escape_string($bd, $fecha_fin);

            // Insertar los datos en la tabla "reserva"
            $sql = "INSERT INTO reserva (id_habitacion, fecha_inicio, fecha_fin) 
                    VALUES ('$id_habitacion','$fecha_inicio', '$fecha_fin')";

                    echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if ($resultado) {
                 header ('C:\xampp\htdocs\evelio\index.php');
            } else {
                echo 'Error al crear la reserva: ' . mysqli_error($bd);
            }
        } else {
            foreach ($errores as $error) {
                echo '<br>' . $error;
            }
        }
}

?>

<div>
    <p>Nueva reserva</p>

    <<a href="../index.php">Regresar</a>

    <form class="formulario" method="POST" action="crear2.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id_habitacion">ID habitación:</label><br>
            <input type="number" id="id_habitacion" name="id_habitacion"><br>

            <label for="fecha_inicio">Fecha de inicio:</label><br>
            <input type="date" id="fecha_inicio" name="fecha_inicio"><br>

            <label for="fecha_fin">Fecha de fin:</label><br>
            <input type="date" id="fecha_fin" name="fecha_fin"><br>

            <input type="submit" id="enviar_reserva" name="enviar_re" value="Crear reserva">
        </fieldset>
    </form>
</div>
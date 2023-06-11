<?php
require 'C:\xampp\htdocs\actividad_entregable\includes\funciones.php';

$bd = conectar_db();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se está enviando el formulario de creación de habitación
    if (isset($_POST['enviar'])) {
        $numero_habitacion = $_POST['numero_habitacion'];
        $tipo_habitacion = $_POST['tipo_habitacion'];
        $estado = $_POST['estado'];

        if (empty($numero_habitacion)) {
            $errores[] = 'El número de habitación es obligatorio';
        }
        if (empty($tipo_habitacion)) {
            $errores[] = 'El tipo de habitación es obligatorio';
        }
        if (empty($estado)) {
            $errores[] = 'El estado es obligatorio';
        }

        if (empty($errores)) {
            $numero_habitacion = mysqli_real_escape_string($bd, $numero_habitacion);
            $tipo_habitacion = mysqli_real_escape_string($bd, $tipo_habitacion);
            $estado = mysqli_real_escape_string($bd, $estado);

            // Insertar los datos en la tabla "habitacion"
            $sql = "INSERT INTO habitacion (numero_habitacion, tipo_habitacion, estado) 
                    VALUES ('$numero_habitacion', '$tipo_habitacion', '$estado')";

            $resultado = mysqli_query($bd, $sql);

            if ($resultado) {
                echo 'Habitacion creada exitosamente.';
            } else {
                echo 'Error al insertar los datos: ' . mysqli_error($bd);
            }
        } else {
            foreach ($errores as $error) {
                echo '<br>' . $error;
            }
        }
    }
}
?>


<div>
    <p>Nueva habitación</p>

    <a href="../index.php">Regresar</a>

    <form class="formulario" method="POST" action="crear.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="numero_habitacion">Número de habitación:</label><br>
            <input type="number" id="numero_habitacion" name="numero_habitacion"><br>

            <label for="tipo_habitacion">Tipo de habitación:</label><br>
            <input type="text" id="tipo_habitacion" name="tipo_habitacion"><br>

            <label for="estado">Estado:</label><br>
            <input type="text" id="estado" name="estado"><br>

            <input type="submit" id="enviar_habitacion" name="enviar" value="Enviar datos">
        </fieldset>
    </form>
</div>


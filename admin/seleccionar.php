<?php
require 'C:\xampp\htdocs\actividad_entregable\includes\funciones.php';

$bd = conectar_db();

$consulta_habitacion = "SELECT * FROM habitacion";
$resultado_habitacion = mysqli_query($bd, $consulta_habitacion);

$consulta_reserva = "SELECT * FROM reserva";
$resultado_reserva = mysqli_query($bd, $consulta_reserva);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar habitaciones y reservas</title>
</head>
<body>
    <h3>Gestión de habitaciones - Consultar</h3>

    <h4>Habitaciones</h4>
    <table>
        <tr>
            <th>ID Habitación</th>
            <th>Número de Habitación</th>
            <th>Tipo de Habitación</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr> 
        <?php while ($habitacion = mysqli_fetch_assoc($resultado_habitacion)) { ?>
        <tr>
            <td><?php echo $habitacion['id_habitacion']; ?></td>
            <td><?php echo $habitacion['numero_habitacion']; ?></td>
            <td><?php echo $habitacion['tipo_habitacion']; ?></td>
            <td><?php echo $habitacion['estado']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <h4>Reservas</h4>
    <table>
        <tr>
            <th>ID Reserva</th>
            <th>ID Habitación</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Fin</th>
        </tr> 
        <?php while ($reserva = mysqli_fetch_assoc($resultado_reserva)) { ?>
        <tr>
            <td><?php echo $reserva['id_reserva']; ?></td>
            <td><?php echo $reserva['id_habitacion']; ?></td>
            <td><?php echo $reserva['fecha_inicio']; ?></td>
            <td><?php echo $reserva['fecha_fin']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="../index.php">Regresar</a>

    <?php mysqli_close($bd); ?>
</body>
</html>

<?php
include "../includes/_db.php";
if (isset($_POST['aceptar'])) {
    $id_cam = $_POST['id_cam'];

    // Realiza la actualización en la base de datos
    $query_actualizacion = "UPDATE cambios SET EST_CAM = 2 WHERE ID_CAM = '$id_cam'";
    $resultado_actualizacion = mysqli_query($conexion, $query_actualizacion);

    if ($resultado_actualizacion) {
        // Refrescar la página actual usando JavaScript
        header("Location: ../views/peticiones.php");
        exit(); 
    } else {
        // Manejar el caso en que haya un error en la actualización
        echo "Error en la actualización: " . mysqli_error($conexion);
    }
}
if (isset($_POST['rechazar'])) {
    $id_cam = $_POST['id_cam'];

    // Realiza la actualización en la base de datos
    $query_actualizacion = "UPDATE cambios SET EST_CAM = 2 WHERE ID_CAM = '$id_cam'";
    $resultado_actualizacion = mysqli_query($conexion, $query_actualizacion);

    if ($resultado_actualizacion) {
        // Refrescar la página actual usando JavaScript
        header("Location: ../views/peticiones.php");
        exit(); 
    } else {
        // Manejar el caso en que haya un error en la actualización
        echo "Error en la actualización: " . mysqli_error($conexion);
    }
}
?>
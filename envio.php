<?php

date_default_timezone_set('America/Guayaquil');

$con = mysqli_connect("localhost", "root", "", "formulario_de_cambios");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_proyecto = $_POST['id_proyecto'];
    $id_usuario = $_POST['id_usuario'];
    $razon = $_POST['subject'];
    $descripcion = $_POST['coments'];
    $prioridad = $_POST['prioridad'];

    $fecha_actual = date("Y-m-d H:i:s");

    $estado = 0;

    $sql = "INSERT INTO CAMBIOS (ID_PRO_CAM, ID_USU_CAM, RAZ_CAM, DES_CAM, PRI_CAM, EST_CAM, FEC_CAM) 
            VALUES ('$id_proyecto', '$id_usuario', '$razon', '$descripcion', '$prioridad', '$estado', '$fecha_actual')";

    $con->query($sql);
    $con->close();

}
    header("Location: formulario.php");
    exit();
?>

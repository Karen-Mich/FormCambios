<?php

// Recupera el valor de idCam enviado desde JavaScript
$idCam = isset($_POST['idCam']) ? $_POST['idCam'] : null;

// Ahora puedes utilizar $idCam en tus consultas SQL u otras operaciones en PHP
echo "Valor de idCam recibido en PHP: " . $idCam;

include "conexion.php";

// Consulta SQL para seleccionar todos los datos de la tabla cambios
$query = "SELECT * FROM cambios WHERE ID_CAM = $idCam";
$result = mysqli_query($conexion, $query);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Obtener el primer resultado (suponiendo que solo esperas un resultado)
    $row = $result->fetch_assoc();

    // Guardar los valores en variables
    $idCam = $row["ID_CAM"];
    $idProCam = $row["ID_PRO_CAM"];
    $idUsuCam = $row["ID_USU_CAM"];
    $desCam = $row["DES_CAM"];
    $razCam = $row["RAZ_CAM"];
    $fecCam = $row["FEC_CAM"];
    $priCam = $row["PRI_CAM"];
    $estCam = $row["EST_CAM"];

    // Imprimir los valores para verificar
    echo "ID_CAM: $idCam - ID_PRO_CAM: $idProCam - ID_USU_CAM: $idUsuCam - DES_CAM: $desCam - RAZ_CAM: $razCam - FEC_CAM: $fecCam - PRI_CAM: $priCam - EST_CAM: $estCam";
} else {
    echo "No se encontraron resultados.";
}
?>
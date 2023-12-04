<?php

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
    echo "ID_CAM: $idCam - ID_PRO_CAM: $idProCam - ID_USU_CAM: $idUsuCam - DES_CAM: $desCam - RAZ_CAM: $razCam - FEC_CAM: $fecCam - PRI_CAM: $priCam - EST_CAM: $estCam" ;
} else {
    echo "No se encontraron resultados.";
}
$porcenPri = null;
if($priCam===1){
    $porcenPri="33%";
}elseif ($priCam == 2) {
    $porcenPri="66%";
} elseif ($priCam == 3) {
    $porcenPri="99%";
}


$subconsulta_proyecto = "SELECT NOM_PRO FROM proyectos WHERE ID_PRO = '$idProCam'";
                            $resultado_subconsulta_proyecto = mysqli_query($conexion, $subconsulta_proyecto);
                            $fila_subconsulta_proyecto = mysqli_fetch_assoc($resultado_subconsulta_proyecto);
                            $NOM_PRO= $fila_subconsulta_proyecto['NOM_PRO'];
                            
                            $prioridad = $priCam;

                            if ($priCam == 1) {
                                $prioridad= 'Baja';
                            } elseif ($priCam == 2) {
                                $prioridad='Media';
                            } elseif ($priCam == 3) {
                                $prioridad='Alta';
                            } else {
                                $prioridad='Prioridad desconocida';
                            }
                            
                            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <h3 class="text-center"><?php echo $NOM_PRO ?> </h1>
   <div class="row g-0  p-3 clickable-row">
    <div class="col-3">
    <strong>Prioridad: </strong>
    </div>
    <div class="col">
    <div class="progress" role="progressbar" aria-label="Example 35px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 20px">
  <div class="progress-bar" style="width: <?php echo $porcenPri;?>"> <?php echo $prioridad;?> </div>
</div>
    </div>
   </div>
   

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
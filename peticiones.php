<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "formulario_de_cambios";


$conexion = mysqli_connect($host, $user, $password, $database);
if(!$conexion){
echo "No se realizo la conexion a la base de datos, el error fue:".
mysqli_connect_error() ;
}

// Realizar la consulta a la base de datos
$query = "SELECT * FROM cambios WHERE EST_CAM=1";
$resultado = mysqli_query($conexion, $query);

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
<div class="row g-0 text-center p-3">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col">
            Fecha
          </div>
          <div class="col">
            Proyecto
          </div>
          <div class="col">
            Solicitante
          </div>
          <div class="col-2">
            Prioridad
          </div>
          <div class="col-2">
            Desición
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-0 text-center p-3">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col">
            Fecha
          </div>
          <div class="col">
            Proyecto
          </div>
          <div class="col">
            Solicitante
          </div>
          <div class="col-2">
            Prioridad
          </div>
          <div class="col-2">
          <button type="button" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-danger">Rechazar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
          // Iterar sobre los resultados de la consulta
          while ($fila = mysqli_fetch_assoc($resultado)) {
              ?>
              <!-- Fila con datos de la base de datos -->
              <div class="row g-0 text-center p-3">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col">
          <?php echo $fila['FEC_CAM'] ?>
          </div>
          <div class="col">
          <?php
                            // Realizar una subconsulta para obtener el nombre del proyecto
                            $id_proyecto = $fila['ID_PRO_CAM'];
                            $subconsulta_proyecto = "SELECT NOM_PRO FROM proyectos WHERE ID_PRO = '$id_proyecto'";
                            $resultado_subconsulta_proyecto = mysqli_query($conexion, $subconsulta_proyecto);
                            $fila_subconsulta_proyecto = mysqli_fetch_assoc($resultado_subconsulta_proyecto);
                            echo $fila_subconsulta_proyecto['NOM_PRO'];
                            ?>
          </div>
          <div class="col">
          <?php
                            // Realizar una subconsulta para obtener el nombre del usuario
                            $id_usuario = $fila['ID_USU_CAM'];
                            $subconsulta = "SELECT NOM1_USU FROM usuario WHERE ID_USU = '$id_usuario'";
                            $resultado_subconsulta = mysqli_query($conexion, $subconsulta);
                            $fila_subconsulta = mysqli_fetch_assoc($resultado_subconsulta);
                            echo $fila_subconsulta['NOM1_USU'];
                            ?>
          </div>
          <div class="col-2">
          <?php
    $prioridad = $fila['PRI_CAM'];

    if ($prioridad == 1) {
        echo 'Baja';
    } elseif ($prioridad == 2) {
        echo 'Media';
    } elseif ($prioridad == 3) {
        echo 'Alta';
    } else {
        echo 'Prioridad desconocida';
    }
    ?>
          </div>
          <div class="col-2">
          <button type="button" class="btn btn-success">Aceptar</button>
        <button type="button" class="btn btn-danger">Rechazar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
              <?php
          }
          ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
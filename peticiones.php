<?php
include "conexion.php";

// Realizar la consulta a la base de datos
$query = "SELECT * FROM cambios WHERE EST_CAM=1";
$resultado = mysqli_query($conexion, $query);


function actualizarEstado($conexion, $id_cam) {
    $query_actualizacion = "UPDATE cambios SET EST_CAM = 2 WHERE ID_CAM = '$id_cam'";
    $resultado_actualizacion = mysqli_query($conexion, $query_actualizacion);

    if ($resultado_actualizacion) {
        echo '<script>window.location.reload();</script>';
    } else {
        echo "Error en la actualización: " . mysqli_error($conexion);
    }
}

if (isset($_POST['aceptar'])) {
    $id_cam = $_POST['id_cam'];
    actualizarEstado($conexion, $id_cam);
}

?>
<!DOCTYPE html>
<html lang="es">
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
<div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
          <form action="AceptarCambio.php" method="post">
                                <input type="hidden" name="id_cam" value="<?php echo $fila['ID_CAM']; ?>">
                                <button type="submit" class="btn btn-success" name="aceptar">Aceptar</button>
                                <button type="submit" class="btn btn-danger" name="rechazar">Rechazar</button>
                            </form>
                            
        
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
              <?php
          }
          ?>



<script>
function aceptarCambio(id_cam) {
    // Realizar una solicitud AJAX al servidor
    $.ajax({
        type: "POST",
        url: "tu_script_php.php", // Reemplaza con el nombre de tu script PHP
        data: { aceptar: true, id_cam: id_cam },
        success: function(response) {
            console.log(response); // Puedes imprimir la respuesta en la consola para depuración
            // Actualizar la sección de la página que necesitas sin recargarla completamente
            // Por ejemplo, si los cambios están dentro de un contenedor con el ID "cambios-container"
            $("#cambios-container").load(location.href + " #cambios-container");
        },
        error: function(error) {
            console.error("Error en la solicitud AJAX: ", error);
        }
    });
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
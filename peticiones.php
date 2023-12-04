<?php
include "conexion.php";

// Realizar la consulta a la base de datos
$query = "SELECT * FROM cambios WHERE EST_CAM=1";
$resultado = mysqli_query($conexion, $query);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="./peticiones.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  
</head>
<body>
<div class="row g-0 text-center p-3 row2">
  <div class="col">
    <div class="card card2" style = "background-color: black; border: 0.5px solid white; color: white; font-size: large;">
      <div class="card-body">
        <div class="row">
          <div class="col">
          <i class='bx bx-calendar' ></i>&nbsp;
            <strong>Fecha</strong>
          </div>
          <div class="col">
          <i class='bx bxs-archive'></i>
            <strong>Proyecto</strong>
          </div>
          <div class="col"><i class='bx bxs-user-voice' ></i>
            <strong>Solicitante</strong>
          </div>
          <div class="col-2"><i class='bx bxs-star' ></i>
            <strong>Prioridad</strong>
          </div>
          <div class="col-2"><i class='bx bx-question-mark' ></i>
            <strong>Desición</strong>
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
              
              <div class="row g-0 text-center p-3 clickable-row" data-id-cam="<?php echo $fila['ID_CAM']; ?>">
  <div class="col">
    <div class="card" style="font-size: medium;">
      <div class="card-body">
        <div class="row">
          <div class="col" data-bs-toggle="modal" data-bs-target="#exampleModal" >
          <?php echo $fila['FEC_CAM'] ?> 
          </div>
          <div class="col" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <?php
                            // Realizar una subconsulta para obtener el nombre del proyecto
                            $id_proyecto = $fila['ID_PRO_CAM'];
                            $subconsulta_proyecto = "SELECT NOM_PRO FROM proyectos WHERE ID_PRO = '$id_proyecto'";
                            $resultado_subconsulta_proyecto = mysqli_query($conexion, $subconsulta_proyecto);
                            $fila_subconsulta_proyecto = mysqli_fetch_assoc($resultado_subconsulta_proyecto);
                            echo $fila_subconsulta_proyecto['NOM_PRO'];
                            ?>
          </div>
          <div class="col" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <?php
                            // Realizar una subconsulta para obtener el nombre del usuario
                            $id_usuario = $fila['ID_USU_CAM'];
                            $subconsulta = "SELECT NOM1_USU FROM usuario WHERE ID_USU = '$id_usuario'";
                            $resultado_subconsulta = mysqli_query($conexion, $subconsulta);
                            $fila_subconsulta = mysqli_fetch_assoc($resultado_subconsulta);
                            echo $fila_subconsulta['NOM1_USU'];
                            ?>
          </div>
          <div class="col-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                <button type="submit" class="btn btn-success" name="aceptar"><i class='bx bxs-user-check' ></i></button>
                                <button type="submit" class="btn btn-danger" name="rechazar"><i class='bx bxs-user-x' ></i></button>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header" data-bs-theme="dark">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="respuestaModal">

      </div>
      
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var filasClickeables = document.querySelectorAll(".clickable-row");

    filasClickeables.forEach(function(fila) {
        fila.addEventListener("click", function() {
            var idCam = parseInt(fila.getAttribute("data-id-cam"), 10);
            console.log("Haz clic en una fila con ID_CAM: " + idCam);

            // Realizar la solicitud AJAX
            $.ajax({
                type: "POST", // Método HTTP de la solicitud
                url: "tu_script_php.php", // Ruta al script PHP que manejará la solicitud
                data: { idCam: idCam }, // Datos que se enviarán al servidor
                success: function(response) {
                    // Manejar la respuesta del servidor (si es necesario)
                    console.log("Respuesta del servidor:", response);
                },
                error: function(error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var filasClickeables = document.querySelectorAll(".clickable-row");

    filasClickeables.forEach(function(fila) {
        fila.addEventListener("click", function() {
            var idCam = parseInt(fila.getAttribute("data-id-cam"), 10);
            console.log("Haz clic en una fila con ID_CAM: " + idCam);

            // Realizar la solicitud AJAX
            $.ajax({
                type: "POST",
                url: "tu_script_php.php",
                data: { idCam: idCam },
                success: function(response) {
                    // Actualizar el contenido del modal con la respuesta
                    document.getElementById("respuestaModal").innerHTML = response;
                    // Mostrar el modal
                    $('#exampleModal').modal('show');
                },
                error: function(error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        });
    });
});
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
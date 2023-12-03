<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <title>Usuarios</title>
</head>
<br>
<div class="container is-fluid">




<div class="col-xs-12">
  		<h1>Bienvenido al Historial de Peticiones <?php echo $_SESSION['nom_usu']; ?></h1>
      <br>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create">
				<span class="glyphicon glyphicon-plus"></span> Nuevo usuario   <i class="fa fa-plus"></i> </a></button>

      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Log Out
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>


		<h1>Lista de usuarios</h1>
    <br>
		<div>
   
		</div>
		<br>

  <?php
$conexion=mysqli_connect("localhost","root","","formulario_cambios"); 
$where="";

if(isset($_GET['enviar'])){
  $busqueda = $_GET['busqueda'];


	if (isset($_GET['busqueda']))
	{
		$where="WHERE nom_pro LIKE'%".$busqueda."%' OR des_pro  LIKE'%".$busqueda."%'
    OR est_pro LIKE'%".$busqueda."%'";
	}
  
}


?>
           <br>


			</form>
      <div class="container-fluid">
      
  <form class="d-flex">
      <h4 >Buscar</h4> <br>
      <input class="form-control me-2 light-table-filter" data-table="table_id" type="text" 
      placeholder="Buscar con JS">
      <hr>
      </form>
  </div>

  <br>

 
      <table class="table table-striped table-dark table_id ">

                   
                         <thead>    
                         <tr>
                        <th>Nombre del Solicitante</th>
                        <th>Correo del solicitante</th>
                        <th>Nombre del proyecto que se realizo la solicitud</th>
                        <th>Rol del solicitante en el proyecto</th>
                        <th>Fecha de solicitud</th>
                        <th>razon del cambio</th>
                        
                       
         
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","formulario_cambios");               
$SQL="SELECT u.nom_usu, u.cor_usu, p.nom_pro, r.nom_rol, c.fec_cam ,c.raz_cam
FROM usuario as u, proyectos_detalle as d , proyectos as p , roles as r, cambios as c
WHERE u.id_usu = c.id_usu_cam
AND p.id_pro = c.id_pro_cam
AND d.id_pro_det = p.id_pro 
AND d.id_rol_det = r.id_rol
/*and u.id_usu = '$_SESSION[id_usu]'*/
and u.id_usu = '1'


$where";

$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['nom_usu']; ?></td>
<td><?php echo $fila['cor_usu']; ?></td>
<td><?php echo $fila['nom_pro']; ?></td>
<td><?php echo $fila['nom_rol']; ?></td>
<td><?php echo $fila['fec_cam']; ?></td>
<td><?php echo $fila['raz_cam']; ?></td>

<td>
<input type="button" value="Mas informacion">
<input type="button" value="Editar">
</td>
</tr>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>

    
    <?php
    
}

?>


	</body>
  </table>

</html>
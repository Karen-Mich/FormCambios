<?php include 'sidemenu.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_formulario.css">
    <title>Formulario</title>
</head>

<body>
    <main>
        <div class="form-content">

            <h2>Enviar un Formulario</h2>

            <form action="envio.php" method="post" id="formulario" style="display: none;">
                <input type="hidden" name="id_proyecto" id="id_proyecto">
                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">

                <label for="customRange2" class="form-label">PRIORIDAD:</label>
                <input type="range" class="form-range" min="0" max="2" id="prioridad" name="prioridad" required>

                <label for="subject" class="form-label">RAZÓN:</label>
                <input type="text" name="subject" id="subject" class="form-label" required>

                <br><label for="coments" class="form-label">DESCRIPCIÓN:</label>
                <textarea name="coments" id="coments" cols="30" rows="5" class="form-label" required></textarea>

                <br><input type="submit" value="Enviar" class="btn" onclick="return confirmar()">
                <input type="button" value="Cancelar" class="btn" id="cancelar">
            </form>

            <label for="project" class="form-label">PROYECTOS:</label>
            <select class="form-select" id="proyectos" name="proyecto" required>
                <option selected>Selecciona un proyecto</option>
                <?php
                $db = new DataBase();
                $con = $db->conectar();
                $usuario = $_SESSION['id'];
                $sql = $con->query("SELECT * FROM proyectos WHERE ID_PRO IN (SELECT ID_PRO_DET FROM PROYECTOS_DETALLE WHERE ID_USU_DET = $usuario) AND EST_PRO = 1");
                if ($sql) {
                    if ($sql->num_rows !== 0) {
                        while ($value = $sql->fetch_assoc()) {
                            $id = $value["ID_PRO"];
                            $nombre = $value["NOM_PRO"];
                ?>
                            <option value="<?php echo $id ?>"><?php echo $nombre ?></option>
                <?php
                        }
                    }
                    $sql->close();
                }
                ?>
            </select>

            <script>
                function confirmar() {
                    var res = confirm("¿Estás seguro de enviar este formulario?, recuerda por política de la empresa no puedes modificar, ni eliminar un formulario enviado a revisión");
                    if (res === true) {
                        return true;
                    }
                    return false;
                }

                document.getElementById('proyectos').addEventListener('change', function() {
                    var formulario = document.getElementById('formulario');
                    var idProyectoInput = document.getElementById('id_proyecto');
                    idProyectoInput.value = this.value;
                    formulario.style.display = this.value !== 'Selecciona un proyecto' ? 'block' : 'none';
                });



                document.getElementById('cancelar').addEventListener('click', function() {
                    var formulario = document.getElementById('formulario');
                    formulario.reset();
                });
            </script>


        </div>
    </main>
</body>

</html>
<?php include '../includes/consultas_sidemenu.php'; ?>
<link rel="stylesheet" href="../css/sidemenu.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="menu-collapsed" id="sidemenu">
    <div id="header">
        <div id="title">
            <span>AB MODEL</span>
        </div>
        <div id="menu-btn">
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>
        </div>
    </div>

    <div id="profile">
        <div id="photo">
            <img src="../img/logo.png">
        </div>
        <div id="name">
            <span>SISTEMA DE <br>PETICIÓN <br> DE CAMBIOS</span>
        </div>
    </div>

    <div id="menu-items">
        <?php
        if (enableFormulario()) { ?>
        <div class="item separator"></div>

            <div class="item">
                <a href="./formulario.php">
                    <div class="icon">
                        <i class="bi bi-textarea-resize" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="title">
                        <span>FORMULARIO</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

        <?php
        if (enableHistorial()) { ?>
            <div class="item separator"></div>
            <div class="item">
                <a href="">
                    <div class="icon">
                        <i class="bi bi-clock-history" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="title">
                        <span>HISTORIAL</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

        <?php
        if (enablePeticiones()) { ?>
            <div class="item separator"></div>
            <div class="item">
                <a href="">
                    <div class="icon">
                        <i class="bi bi-ui-checks" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="title">
                        <span>PETICIONES</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

        <div class="item separator"></div>
        <div class="item">
            <a id="close" href="../includes/login.php" onclick="salida('closeSession')">
                <div class="icon">
                    <i class="bi bi-box-arrow-left" style="font-size: 1.5rem;"></i>
                </div>
                <div class="title">
                    <span>CERRAR SESIÓN</span>
                </div>
            </a>
        </div>

    </div>

</div>

<script>
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#sidemenu');
    btn.addEventListener('click', e => {
        menu.classList.toggle("menu-expanded");
        menu.classList.toggle("menu-collapsed");
        document.querySelector('body').classList.toggle('body-expanded');
    });

    function salida(valor) {
        $.ajax({
            url: "./consultas_sidemenu.php",
            type: "POST",
            data: {
                funcion: valor
            },
            error: function(error) {
                console.error("Error al ejecutar la función PHP:", error);
            }
        });
    }
</script>
<?php
include 'consultas_sidemenu.php';
?>
<link rel="stylesheet" href="./sidemenu.css">
<div class="menu-collapsed" id="sidemenu">
    <div id="header">
        <div id="title">
            <span>VIDA MRR</span>
        </div>
        <div id="menu-btn">
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>
        </div>
    </div>

    <div id="profile">
        <div id="photo">
            <img src="4500791.png">
        </div>
        <div id="name">
            <span>SharpBlade</span>
        </div>
    </div>

    <div id="menu-items">
        <?php
        if (proyectos()) { ?>
            <div class="item">
                <a href="">
                    <div class="icon">
                        <i class="bi bi-terminal"></i>
                    </div>
                    <div class="title">
                        <span>Formulario</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

        <?php
        if (proyectos()) { ?>
            <div class="item">
                <a href="">
                    <div class="icon">
                        <i class="bi bi-terminal"></i>
                    </div>
                    <div class="title">
                        <span>Formulario</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

        <?php
        if (proyectos()) { ?>
            <div class="item">
                <a href="">
                    <div class="icon">
                        <i class="bi bi-terminal"></i>
                    </div>
                    <div class="title">
                        <span>Formulario</span>
                    </div>
                </a>
            </div>

        <?php
        } ?>

    </div>

</div>

<main>
    <p>HOla</p>
</main>

<script>
    const btn = document.querySelector('#menu-btn');
    const menu = document.querySelector('#sidemenu');
    btn.addEventListener('click', e => {
        menu.classList.toggle("menu-expanded");
        menu.classList.toggle("menu-collapsed");
        document.querySelector('body').classList.toggle('body-expanded');
    });
</script>
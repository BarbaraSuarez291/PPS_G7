
<div class="barra">


    <div class="menu-nav ">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="img/menu-icon.png" alt="" style="width:40px;"> </label>
        <nav class="navegacion-principal clearfix">



            <ul>

                <li> <a href="index.php">Inicio</a></li>
                <li> <a href="publicaciones.php">Nosotros</a></li>
                <li> <a href="clases.php">Clases</a></li>
                <li> <a href="eventos.php">Eventos</a></li>

                <?php if (!isset($_SESSION["nombre"])) : ?>
                    <li id="icon-user"><a href="login.php"><i class="fas fa-user"></i></a></li>

                <?php endif; ?>

                <?php if (isset($_SESSION["nombre"])) : ?>

                    <?php if ($_SESSION["rol"] == 'admin') : ?>
                        <li><a href="listadoPublicaciones.php">Editar contenidos</a></li>


                    <?php endif; ?>
                    <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        <?php endif; ?>



        </nav>
        <div class="contenedor clearfix logoo">
            <div class="logo">
                <img src="img/logo.svg" alt="logo ballet">
            </div>
        </div>

        <!--.contenedor-->
    </div>
    <!--.barra-->
</div>
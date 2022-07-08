<head>
    <link rel="stylesheet" href="./css/nav.css">
</head>
<div class="barra">
    <input type="checkbox" id="btn-menu">
    <label for="btn-menu"><img id="imagen-menu" src="img/menu-icon.png" alt="" style="width:40px;">
    </label>

            <nav class="menu">
                <ul>
                    <li>
                    <div class="contenedor clearfix logoo">
                <div class="logo">
                    <img src="img/logo.png" alt="logo ballet">
                </div>
            </div>

                    </li>
                    <li> <a href="index.php">Inicio</a></li>
                    <li> <a href="nosotros.php">Nosotros</a></li>
                    <li> <a href="clases.php">Clases</a></li>
                    <li> <a href="eventos.php">Eventos</a></li>
                   

                        <?php if (!isset($_SESSION["nombre"])) : ?>
                            <li id="icon-user"><a href="login.php"><i class="fas fa-user"></i></a></li>

                        <?php endif; ?>

                        <?php if (isset($_SESSION["nombre"])) : ?>

                            <?php if ($_SESSION["rol"] == 'admin') : ?>
                                <li><a href="listadoPublicaciones.php"><i class="fa-solid fa-pencil"></i></a></li>


                            <?php endif; ?>
                            <li><a href="logout.php">Cerrar sesión</a></li>
                
                        <?php endif; ?>
                </ul>
            </nav>

            
</div>
<?php
include_once('db/conexionDB.php');
include_once('includes/head.php');
include_once('includes/funciones.php'); 

if($_GET['id']){
    $idUsuario = $_GET['id'];
    $pedido = traer_ultimo_pedido_por_usuario($idUsuario, $conexion);
    $publicacion = traer_publicacion($pedido['idPublicacion'], $conexion);

}


include_once('includes/nav.php'); 
?>

<body>
<div class="container contenedor_pedido" >
<div>
<div class="card_entradas" style="max-width: 550px;">

<h1>Tu pedido fue realizado con exito!</h1>
<h6>Detalle de pedido:</h6>
<h6>Fecha del evento:  <?php echo $publicacion['fechaEvento']; ?></h6>
<h6><?php echo $publicacion['descripcion'] ?></h6>

<h6 class="card-title text-center"><?php //echo $entradas[$i]['nombre'] ?></h6>
<p> Cantidad: <?php echo $pedido['cantidad'] ?></p>
<p> Total a pagar: <?php echo $pedido['precio_total'] ?></p>
<p>Para continuar con la compra:</p>
<?php if($pedido['metodo_de_pago']== 'transferencia'){  ?>

<strong><p>Elegiste medio de pago como transferencia te pasamos nuestro cbu para que puedas realizarla.</p></strong>
<p>Una vez hecha la transferencia envianos el comprobante de pago a traves de whatsapp y posterior coordinamos la/s entrega de entrada/s.</p>
<p>CBU : 23234234345564546</p>
<p>Alias : 23234234345564546</p>
<?php } else { ?>
  <p>Elegiste como medio de pago efectivo, comunicate con nosotros directamente a traves de whatsapp para coordinar pago y la entrega de las entradas.</p>
  <?php } ?>
<a href="https://walink.co/3a91c8" style="color:green;"><i style="color:green;font-size:2.8rem;" class="fa-brands fa-whatsapp"></i>Comunicate con nosotros</a>
</div>

</div>
</div>




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>




<?php
// SDK de Mercado Pago
require 'vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-5780316345703063-041420-750d2077315cfce6e7722d481de7cc15-1107119758');
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$item = new MercadoPago\Item();
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Entrada para el ballet';
$item->id= '01';
$item->quantity = 1;
$item->unit_price = 100;
$item->currency_id = "ARS";

$preference->items = array($item);
$preference->save();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
     include_once('includes/head.php');
    ?>
    <title>Document</title>
</head>
<body>

  
<?php 

include_once('includes/nav.php');

?>
<div class="contenedor-boton" style="margin-top:10rem; margin-bottom:5rem;">
<div class="cho-container"></div>
<<<<<<< HEAD
  <h1> Entrada para el Festival en Mar del <?php ?>Plata </h1>
=======
  <h1> Entrada para el Festival en Mar del Plata </h1>
>>>>>>> 26a3f6cf0bb8a870342374e2a28b1f13bd49179c
  <p>  En este festival van disfrutar de una experiencia una unica con la danza de los alumnos de nuestra academia 
       el cual daran un show que durara 2 hs.
       Comazara a las 18 hs el evento, los esperamos!!! </p>
</div>  

 <div class="contenedor-boton" style="margin-top:10rem; margin-bottom:5rem;">
  <td>
		<script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
  
const mp = new MercadoPago('TEST-c1ae2abd-d47b-42d3-b7ff-337cc78dca9d', {
	locale: 'es-AR', advancedFraudPrevention : true, 
});
const checkout = mp.checkout({
   preference: {
	   id: "<?php echo $preference->id?>" 
   },
   render: {
	   container: '.cho-container', 
	   label: 'Pagar', 
	}
});
     </script>
  </td>
  </div>
<?php include_once('includes/footer.php'); ?>
 <!-- . . . . . . . . . . . .-->

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
<<<<<<< HEAD
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
=======
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview');
>>>>>>> 26a3f6cf0bb8a870342374e2a28b1f13bd49179c
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>
</html>

<?php
// SDK de Mercado Pago
require 'vendor/autoload.php';
require 'js/token.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken($token);
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
    <title>Document</title>
</head>
<body>
  <div class="cho-container"></div>
		<script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
      
const mp = new MercadoPago('', {
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
</body>
</html>

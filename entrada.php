<?php
include_once('db/conexionDB.php');
include_once('includes/funciones.php');
include_once('includes/head.php');
include_once('includes/nav.php');
if ($_GET['id']) {
  $idPublicacion = $_GET['id'];
  $publicacion = traer_publicacion($idPublicacion, $conexion);
  $entradas = traer_entrada($idPublicacion, $conexion);
  $archivos = traer_archivos($idPublicacion, $conexion);
}

$error = false;
if(isset($_POST['cantidad'] )&& isset($_POST['metodo_de_pago']) && isset($_POST['contacto'])){
if (!empty($_POST['cantidad']) && !empty($_POST['metodo_de_pago']) && !empty($_POST['contacto']) )  {
  $cant = $_POST['cantidad'];
  $forma_de_pago = $_POST['metodo_de_pago'];

  $disponibilidad_entradas = verificar_disponibilidad_entradas($cant, $entradas['cantidad']);
  if($disponibilidad_entradas == false){
    $error = true;
    $message = "No hay entradas disponibles.";
  }
  if ($error == false && isset($_POST)) {
    if($_SESSION == null){
      $error= true; //
      $message = "Debe iniciar sesion para poder realizar un pedido de entradas.";
    } else {
      $user= buscar_usuario_por_email($_SESSION['email'], $conexion);
      $pedido_realizado = datos_de_pedido($publicacion['idPublicacion'], $cant, $user['idusuarios'], $conexion , $_POST['contacto'], $_POST['metodo_de_pago']);
      if($pedido_realizado == true){
      //si el pedido fue guardado en la base de datos se busca en pedidos.php los datos del ultimo pedido realizado segun el id de usuario
      header('Location:pedido.php?id='.urlencode($user['idusuarios']));
      }
    }
  }
} else{
  $error= true;
  $message = "Todos lo campos son obligatorios.";

}

}
//include_once('includes/nav.php');
?>

<body>

  <div class="container entrada_evento" style="margin-top:10rem;">
    <h1>Entradas</h1>
    <p>Fecha del evento: <?php echo $publicacion['fechaEvento']; ?></p>
    <p><?php echo $publicacion['descripcion'] ?></p>
    <?php
    $extension = devuelve_extension_de_archivo($archivos[0]['tipo']);

    if ($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png') {
      echo  "<div class='col-md-12'><img  class='responsive-img card-img-top col-md-12' src='data:image/jpeg; base64, " . base64_encode($archivos[0]['contenido']) . "'> </div>";
    } else {

      echo "<div class='d-flex justify-content-center' col-md-12> <video  class='col-md-12'src='data:video/mp4; base64, " . base64_encode($archivos[0]['contenido'])  . "'  controls width='360' height='270'></video> </div>";
    }

    ?>
    <div class="entradas">
      <div>
        <h2>Entradas:</h2>
      </div>
      <div>
        <?php if ($error == true) : ?>
          <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 120px;" role="alert">
            <strong><?php echo $message ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>


        <form action="#" method="post">
          <div class="card_entradas" style="max-width: 300px; margin: 20px;">
            <h5 class="card-title text-center"><?php echo $entradas['nombre'] ?></h5>
            <p><?php echo $entradas['descripcion'] ?></p>
            <p> Precio: $<?php echo $entradas['precio'] ?></p>
            <p>Entradas disponibles: <?php echo $entradas['cantidad'] ?></p>
            <form action="pedido.php" method="get">

              <div class="err-input"> <label for="cantidad">Seleccione la cantidad:</label> <select id="select_cantidad" lass="content-select" name="cantidad" required>
                  <option value="0" selected>0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                <p id="errCant" class="err-alert"></p>
              </div>
              <div>
                <div class="err-input">
                  <label for="cantidad">Seleccione la cantidad:</label> <select id="metodo_de_pago" lass="content-select" name="metodo_de_pago" required>
                    <option value="0" selected>Eliga metodo de pago</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia</option>
                  </select>
                  <p id="err-metodo-de-pago" class="err-alert"></p>
                </div>

                <div class="err-input">
                  <label for="contacto">Antes de terminar dejanos un numero de contacto</label> 
                <input name="contacto" type="text" id="contacto" class="form-control">
                <p id="err-numero-usuario" class="err-alert"></p>
                </div>
                <div class="text-center"> <a class='ticket' href='pedido.php?id=<?php echo $idPublicacion ?>'> <button type="input" class="btn btn-dark">Realizar pedido</button> </a></div>
            </form>
          </div>
        </form>
      </div>
    </div>


  </div>
</div>

  <?php include_once('includes/footer.php'); ?>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


  

  <script src="js/entradas_validacion.js"></script>


</body>

</html>















<?php

include_once('includes/head.php');
include_once('includes/nav.php');
?>

<body>
  <div class="form-login" id="recup_pass">
    <h2>Cambiar contraseña</h2>
    <form action="nueva_pass.php" name="mod1" method="POST">
      <div>
        <input type="text" id="email" name="email" placeholder="Ingrese su email"/>
      </div>
      <div>
        <input type="password" id="pass" name="pass" placeholder="Ingrese su nueva contraseña"/>
      </div>
      <div class="botones-link ">
        <button type="submit" name="enviar" value="Cambiar contraseña">Recuperar contraseña</button>
      </div>
    </form>
  </div>
  <?php
  include_once('includes/footer.php');
  ?>
</body>

</html>
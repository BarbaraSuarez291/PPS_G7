<?php

include_once('includes/head.php');
include_once('includes/nav.php');
?>
<body>
    <div class="form-login" id="recup_pass">
    <form action="./envia_mail.php" method="POST">
    <h2><label>Ingrese su e-mail</label></h2>
    <input type="text" id="email" name="email" placeholder="e-mail">
    <div class="botones-link ">
    <button type="submit" id="recuperar" name="recuperar" value="Recuperar contraseña">Recuperar contraseña</button>
    </div>
    </form>
    </div>
<?php
include_once('includes/footer.php');
?>
</body>
</html>
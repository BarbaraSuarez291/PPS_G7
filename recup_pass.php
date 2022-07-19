<?php

include_once('includes/head.php');
include_once('includes/nav.php');
?>
<body>
    <div class="form-login" id="recup_pass">
    <form action="./envia_mail.php" method="POST">
    <h2><label>Ingrese su e-mail</label></h2>
    <div class="err-input">
        <input id="emailSignUp" class="input" type="email" placeholder="email" name="email" value="<?= isset($_POST["email"]) ? $_POST["email"] : '' ?>">
        <p id="errEmail" class="err-alert"></p>
      </div>
    <div class="botones-link ">
    <button type="submit" id="recuperar" name="recuperar" value="Recuperar contraseña">Recuperar contraseña</button>
    </div>
    </form>
    </div>
<?php
include_once('includes/footer.php');
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/form.js">

</script>
</body>
</html>
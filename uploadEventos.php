<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Evento</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<?php include_once('includes/head.php'); ?>
<?php include_once('includes/navAdmin.php'); ?>

<body>

<div>
        <div class="container-fluid column  mt-4 d-flex justify-content-center">
            <div class=" justife-content-center col-md-10">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center"><h3>Nuevo evento</h3></div>
                        <div class="card-body">
                            <form action="AltaEventoDB.php" method="post" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="i1" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input name="archivo1" type="file" class="form-control btn-file" id="btn_file" onchange="return validarExt()" /><br />
                                    </div>

                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"></textarea><br />
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="fechaEvento" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input type="date" name="fechaEvento" id=""><br />
                                    </div>

                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <input type="submit" value="Crear Evento" class="btn btn-primary" />
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>

            </div>

</div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='js/altaPublicacion.js'>

    </script>
</body>

</html>
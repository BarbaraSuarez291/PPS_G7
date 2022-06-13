<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva publicacion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<?php include_once('includes/head.php'); ?>
<?php include_once('includes/nav.php'); ?>

<body>

<div>
        <div class="container-fluid column  mt-4 d-flex justify-content-center">
            <div class=" justife-content-center col-md-10">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center"><h3>Nueva publicacion</h3></div>
                        <div class="card-body">
                            <form action="AltaPublicacionDB.php" method="post" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label for="i1" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input name="archivo1" type="file" class="form-control btn-file" id="btn_file" onchange="return validarExt()" /><br />
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="i1" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input name="archivo2" type="file" class="form-control" /><br />
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="i1" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input name="archivo3" type="file" class="form-control" /><br />
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="i1" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <input name="archivo4" type="file" class="form-control" /><br />
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="descripcion" class="col-md-3 col-form-label text-md-right"></label>
                                    <div class="col-md-7 center">
                                        <textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"></textarea><br />
                                    </div>

                                </div>

                                <div class="col-md-6 offset-md-3">
                                    <input  type="submit" value="Crear Publicacion" class="btn btn-outline-primary" />
                                </div>

                            </form>
                        </div>
                    </div>


                </div>
            </div>

            </div>

</div>
        




    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src='js/altaPublicacion.js'>

    </script>
</body>

</html>
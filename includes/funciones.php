<?php

//Verifica extension del archivo que se le pasa
function devuelve_extension_de_archivo($archivo){
    $extension = new SplFileInfo($archivo);
    $extension->getExtension();
    $extension = strtolower($extension);
    return $extension;
}

//Sube archivo a base de datos
function subirArchivo($archivo, $conexion, $idPublicacion)
{
    $nombre_archivo = $archivo['name'];
    $tipo_archivo = $archivo['type'];
    $tamaño_archivo = $archivo['size'];

    if ($tamaño_archivo <=  5242880) {
        //Ruta de la carpeta destino en servidor
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/intranet/uploads/';
        //Movemos la imagen del directorio temporal al directorio escogido
        move_uploaded_file($archivo['tmp_name'], $carpeta_destino . $nombre_archivo);
        //apuntamos al archivo con fopen , se le pasa la ruta y el permiso de lectura ("r")
        $archivo_objetivo = fopen($carpeta_destino . $nombre_archivo, "r");
        //dentro de la variable contenido se van a guardar la sucesion de bytes que forman el archivo elegido
        $contenido = fread($archivo_objetivo, $tamaño_archivo);
        $contenido = addslashes($contenido);
        //cerramos con fcloser
        fclose($archivo_objetivo);
        $insertArchivo = "INSERT INTO `archivos` (`idArchivo`, `idPublicacion`, `nombre`,`tipo`, `contenido`) VALUES (0, '$idPublicacion', '$nombre_archivo', '$tipo_archivo', '$contenido')";

        if (mysqli_query($conexion, $insertArchivo)) {
            echo 'Publicacion insertada correctamente.';
        } else {
            echo 'Error al insertar el archivo' . mysqli_error($conexion);
        }
    }
}

//______________________________________________________________________________


//la funcion 'verificarPostArchivo' verifica q exista post, si existe verifica si es un video o una imagen y la sube
function verificarPostArchivo($archivo, $extensions_arr, $idPublicacion, $conexion)
{
    if ((is_uploaded_file($archivo['tmp_name']))) {
        $nombre_file =    $archivo['name'];
        // Obtenemos la extension del archivo
        $videoFileType = strtolower(pathinfo($nombre_file, PATHINFO_EXTENSION));
        // Revisar extension
        if (in_array($videoFileType, $extensions_arr)) {
            subirArchivo($archivo, $conexion, $idPublicacion);
        } else {
            subirArchivo($archivo, $conexion, $idPublicacion);
        }
    }
}
//_______________________________________________________
//Funcion para verificar si la fecha de un evento es pasada a la actual, si es asi lo elimina
function verificarFechaEvento($conexion)
{
    $fechaActual = date('Y-m-d');
    $consulta =  "SELECT * FROM publicaciones WHERE `tipo`='evento' ORDER BY fechaEvento ASC";
    $resultado = mysqli_query($conexion, $consulta);

    while ($fila = mysqli_fetch_array($resultado)) {

        if ($fechaActual >= $fila['fechaEvento'] ) {
            $idPublicacion = $fila['idPublicacion'];
            $query = "DELETE FROM `publicaciones` WHERE `idPublicacion` = '$idPublicacion'";
            $result = mysqli_query($conexion, $query);
            $query2 = "DELETE FROM `archivos` WHERE `idPublicacion` = '$idPublicacion'";
            $result2 = mysqli_query($conexion, $query2);
            header('Location:eventos.php');
        }

    }

    return true;
}


//_______________________________________________________

//Cuenta cuantos archivos existen por publicacion
function contadorDeArchivos($conexion, $idPublicacion){
$query ="SELECT count(idPublicacion) FROM archivos WHERE idPublicacion='$idPublicacion'";
$result = mysqli_query($conexion, $query);
$result = mysqli_fetch_assoc($result);

if($result > 0){

    return $result;

}

}



//_______________________________________________________


//Eliminar Archivo
function eliminarArchivo($conexion, $id, $idPublicacion){
    $query = "DELETE FROM `archivos` WHERE `idArchivo` = $id";
        $resultado = mysqli_query($conexion, $query);
        $url = "publicacionABM.php?id=".$idPublicacion;
        header('refresh:1; url='.$url);
        if (!$resultado) {
            die("Query Failed.");
        }
}



/*_____________________________________*/ 

function datosDeNuevoUsuario($unArray)
{
  if ($unArray) {
    $usuario = [
      'nombre' => trim($unArray['nombre']),
      'apellido' => $unArray['apellido'],
      'email' => trim($unArray['email']),
      'clave' => password_hash($unArray['password'], PASSWORD_DEFAULT),
      'rol' => 'user',

    ];
    return $usuario;
  }
}




function crear_session_para($usuario)
{
  $_SESSION['nombre'] = $usuario['nombre'];
  $_SESSION['apellido'] = $usuario['apellido'];
  $_SESSION['email'] = $usuario['email'];
  $_SESSION['rol'] = $usuario['rol'];
}


function registrarUsuario($user, $conexion)
{
  $rol =  $user['rol'];
  $nombre = $user['nombre'];
  $apellido = $user['apellido'];
  $email = $user['email'];
  $password = $user['clave']; // se encripta en la funcion 'datosDeNuevoUsuario'
  $consulta = "INSERT INTO `usuarios` (`email`, `clave`, `rol`, `nombre`,`apellido`) VALUES ('$email','$password', '$rol', '$nombre', '$apellido')";

  //Paso 5: Ejecupatmos la consulta SQl

  if (mysqli_query($conexion, $consulta)) {
    echo 'Registro insertado correctamente.';
    // header("location: index.php");
  } else {
    echo 'Error:  NO SE PUDO REGISTRAR AL USUARIO ' . mysqli_error($conexion);
  }
  //Paso 6: Cierro la conexion
  //mysqli_close($conexion);
}

function ingresoUsuario($email, $password, $conexion)
{

  $consulta = "SELECT * FROM `usuarios` WHERE `email`='$email'";
  $usuario = mysqli_query($conexion, $consulta);
  $fila = mysqli_fetch_assoc($usuario);
  if ($fila) {
    if (password_verify($password , $fila['clave'])) {
      return $fila;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function existeUsuario($email, $conexion)
{

  $consulta = "SELECT * FROM `usuarios` WHERE `email`='$email'";
  $usuario = mysqli_query($conexion, $consulta);
  $fila = mysqli_fetch_assoc($usuario);
  if ($fila) {
    return true;
  } else {
    return false;
  }
}
//Trae  publicacion segun id
function traer_publicacion($id, $conexion) {
  $consulta =  "SELECT * FROM publicaciones WHERE `idPublicacion`= $id";
  $resultado = mysqli_query($conexion, $consulta);
  $publicacion = mysqli_fetch_array($resultado);
  return $publicacion;
}
//Trae entrada segun el id de la publicacion
function traer_entrada($id, $conexion) {
  $consulta =  "SELECT * FROM entradas WHERE `idPublicacion`= $id";
  $resultado = mysqli_query($conexion, $consulta);
  $entradas= mysqli_fetch_array($resultado);
  
  return $entradas;
}

function traer_archivos($idPublicacion,$conexion){
  $consulta = "SELECT idArchivo,  tipo, contenido FROM `archivos` where `idPublicacion`= '$idPublicacion'";
  $resultado = mysqli_query($conexion, $consulta);
  $archivos= [];
  while($fila = mysqli_fetch_array($resultado)){
    $archivos[]= $fila;
      }
      return $archivos;
}


function verificar_disponibilidad_entradas($cantidad_pedida ,$cantTotal ){
if (intval($cantTotal)== 0) {
  return false;
} elseif(intval($cantTotal) >= intval($cantidad_pedida)){
  return true;
}else {
  return false;
}
}

function datos_de_pedido($id, $cant, $user, $conexion , $telefono, $metodo_de_pago){
  $entrada = traer_entrada($id, $conexion);
  $cantidadActual = intval($entrada['cantidad']);
  if($cantidadActual >= $cant){
  $cantidad_actualizada = intval($entrada['cantidad']) - intval($cant);
  if($cantidad_actualizada>= 0){
    $query = "UPDATE  `entradas` SET `cantidad`= '$cantidad_actualizada'  WHERE `idPublicacion` = '$id'";
    $result = mysqli_query($conexion, $query);
    if(!$result){
      return false;
    } else {
      $monto_a_pagar = $entrada['precio']*$cant;
      $consulta = "INSERT INTO`pedidos` (`id`, `idPublicacion`, `user`, `cantidad`, `precio_total`, `telefono`, `metodo_de_pago`) VALUES (0, '$id','$user','$cant','$monto_a_pagar', '$telefono', '$metodo_de_pago' )";



      $result = mysqli_query($conexion, $consulta);
if($result){
  return true;
//  header("Location: Pagina.php?mensaje=".urlencode($cant));
} else {
return false;
}
    }
  } else {
    return false;
  }

}else {
    return false;
  }

}


function buscar_usuario_por_email($email, $conexion){
$query = "SELECT * FROM usuarios WHERE `email`='$email'";
$result = mysqli_query($conexion, $query);
$usuario = mysqli_fetch_array($result);
if($result){
  return $usuario;
}
}

function traer_ultimo_pedido_por_usuario($id, $conexion){
  $query = "SELECT * FROM pedidos WHERE `user`='$id' ORDER BY `id` DESC"; 
$result = mysqli_query($conexion, $query);
$pedido = mysqli_fetch_array($result);
if($result){
  return $pedido;
}
}


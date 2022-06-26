<?php  
include("configuracion.php");
$conexion = new mysqli($server, $user, $pass, $bd);
//verifica si hay error al conectar
if(mysqli_connect_errno()) {
	echo "No conectado", mysqli_connect_errno();
	exit();
}
else{
	#echo 'Conectado';
}

?>
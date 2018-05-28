<?php
include 'conexiones.php';
function borrarusuario(){
	$respuesta=false;
	$usuario=GetSQLValueString($_POST["usuario"],"text");
    $usuario=GetSQLValueString($_POST["nombre"],"text");
    $usuario=GetSQLValueString(md5$_POST["clave"]."text");



	//Conectarnos al servidor de BD
	$con=conecta();
	//$consulta="select usuario from usuarios where usuario='".$usuario."'limit 1 ";
	//echo $consulta;
	$consulta=sprintf("delete from usuarios where usuario = %s",$usuario);
	$resConsulta=mysqli_query($con,$consulta);
	$consultaGuarda = "";
	//si ya existe en la tabla el usuario
	if(mysqli_affected_rows($con) > 0){
	    //Actualizamos	
	    $respuesta = true;
	}

	$salidaJSON = array('respuesta' => $respuesta);
                     
	print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'borrarUsuario':
          borrarusuario(); 		
		break;
	
	default:
		# code...
		break;
}

?>
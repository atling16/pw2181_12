<?php
include 'conexiones.php';
function buscarusuario(){
	$respuesta=false;
	$usuario=$_POST["usuario"];
	//Conectarnos al servidor de BD
	$con=conecta();
	$consulta="select usuario,clave from usuarios where usuario='".$usuario."'limit 1 ";
	//echo $consulta;
	$resConsulta=mysqli_query($con,$consulta);
	$nombre = "";
	$clave  = "";
	if(mysqli_num_rows($resConsulta) > 0){
		$respuesta = true;
		while($regConsulta=mysli_fetch_array($resConsulta)){
                $nombre = $regConsulta["nombre"];
                $clave  = $regConsulta["clave"];
		}

	}
	$salidaJSON = array('respuesta' => $respuesta,
                        'nombre'    => $nombre,
                        'clave'     => $clave);

	print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'buscarUsuario':
          valida(); 		
		break;
	
	default:
		# code...
		break;
}

?>
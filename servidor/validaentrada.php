<?php
include 'conexiones.php';
function valida(){
	$respuesta=false;
	$usuario=$_POST["usuario"];
    $clave  =md5($_POST["clave"]);
	//Conectarnos al servidor de BD
	$con=conecta();
	$consulta="select usuarios,clave from usuario where usuarios= '".$usuario."' and clave='".$clave."' limit 1 ";
	$resConsulta=mysqli_query($con,$consulta);
	if(mysqli_num_row($resConsulta) > 0){
		$respuesta = true;
        while($regConsulta=mysqli_encode($resConsulta)){
        	$nombre = utf8_encode($regConsulta["nombre"]);
        	
        }
	}
	$salidaJSON = array('respuesta' => $respuesta );
	print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'validaentrada':
          valida(); 		
		break;
	
	default:
		# code...
		break;
}

?>
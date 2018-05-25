<?php
include 'conexiones.php';
function guardarusuario(){
	$respuesta=false;
	$usuario=GetSQLValueString($_POST["usuario"],"text");
    $usuario=GetSQLValueString($_POST["nombre"],"text");
    $usuario=GetSQLValueString(md5$_POST["clave"]."text");



	//Conectarnos al servidor de BD
	$con=conecta();
	//$consulta="select usuario from usuarios where usuario='".$usuario."'limit 1 ";
	//echo $consulta;
	$consulta=sprintf("select usuario from usuarios where usuario = %s",$usuario);
	$resConsulta=mysqli_query($con,$consulta);
	$consultaGuarda = "";
	//si ya existe en la tabla el usuario
	if(mysqli_num_rows($resConsulta) > 0){
	    //Actualizamos	
	    $consultaGuarda=sprintf("update usuarios set nombre = %s,clave = %s where usuario = %s",
	   $nombre,$calve,$usuario);
	}else{
		$consultaGuarda=sprintf("insert into usuarios values(default,%s,%s,%s)"),$usuario,$nombre,$clave);
	}
     mysqli_query($con,$consultaGuarda);//ejecuta la consulta
     if(mysqli_affected_rows()>0){
     	$respuesta = true;
     }

	$salidaJSON = array('respuesta' => $respuesta,
                        'nombre'    => $nombre,
                        'clave'     => $clave);

	print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'guardarUsuario':
          guardarusuario(); 		
		break;
	
	default:
		# code...
		break;
}

?>
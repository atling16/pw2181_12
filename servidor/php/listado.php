<?php
include 'conexiones.php';
function listado(){
	$respuesta=false;
	$usuario=GetSQLValueString($_POST["usuario"],"text");
    $usuario=GetSQLValueString($_POST["nombre"],"text");
    $usuario=GetSQLValueString(md5$_POST["clave"]."text");



	//Conectarnos al servidor de BD
	$con=conecta();
	//$consulta="select usuario from usuarios where usuario='".$usuario."'limit 1 ";
	//echo $consulta;
	$consulta=sprintf("select * from usuarios order by nombre = %s",$usuario);
	$resConsulta=mysqli_query($con,$consulta);
	$tabla ="";
	//si ya existe en la tabla el usuario
	if(mysqli_affected_array($resConsulta) > 0){//cantidad de registros
	    //Actualizamos	
	    $respuesta = true;
	    $tabla.= "<thead>";
        $tabla.= "<tr>";
        $tabla.= "<th>No.</th><th>Usuario</th><th>Nombre</th>";
        $tabla.= "</tr>";
        $tabla.= "</thead>";
        $tabla.= "<tbody>";
        //Regisros de la tabla
           while($registro=mysqlq_fetch_array($resConsulta)){
               $tabla.= "<tr>";
               $tabla.$cuenta."<td></td>";
               $tabla.$registro["usuario"]. "<tr></td>";
               $tabla.$registro["usuario"]. "<tr></td>";
               $tabla.= "</tr>";

           }
           	$tabla.=
        $tabla.= "</tbody>";
	}

	$salidaJSON = array('respuesta' => $respuesta,
 						'tabla'     => $tabla);

                     
	print json_encode($salidaJSON);
}
$opc=$_POST["opc"];
switch ($opc) {
	case 'listado':
          listado(); 		
		break;
	
	default:
		# code...
		break;
}

?>
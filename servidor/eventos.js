var inicioApp = function(){
	var Aceptar = function(){
		var usuario=$("#txtUsuario").val();
		var clave  =$("#txtClave").val();
		var parametros="opc=validaentrada"+
		               "&usuario="+usuario+
		               "&clave="+clave+
		               "&aleatorio="+Math.random();
		$.ajax({
			cache:false,
			type: "POST",
			datatype:"json",
			url: "php/validaentrada.php",
			data: parametros,
			success:function(response){
				if (response.respuesta == true){
					//Ocultamos
					$("#secInicio").hide("slow");
					//Aparecemos usuarios
					$("#frmUsuarios").show("slow");
					//cursor en el primer cuadro de texto
					$("#txtNombreUsuario").focus();


				}else{
					alert("Usuario o clave incorrecta(s)");
				}
                
			},
			error:function(xhr,ajaxOptions,thrownError){
               
			}
		});               

	}
	var buscarUsuario = function(){
		var usuario = $("#txtNombreUsuario").val();
		var parametros = "opc=buscarUsuario"+
		                 "&usuario="+usuario+
		                 "&aleatorio="+Math.random();
		  if(usuario != ""){
			$.ajax({
			cache:false,
			type: "POST",
			datatype:"json",
			url: "php/busacarusuario.php",
			data: parametros,
			success:function(response){
				if (response.respuesta == true){
					$("#txtNombre").val(response.nombre);
					$("#txtClaveUsuario").val(response.clave);
				}else{
					$("#txtNombre").focus();
				}
                
			},
			error:function(xhr,ajaxOptions,thrownError){
               
			}
		});               
		}
	}
	var teclaNombreUsuario = function(tecla){
		if(tecla.which == 13){//enter
			buscarUsuario();

		}
	}


	var Guardar = function(){
		var usuario=$("#txtNombreUsuario").val();
		var nombre =$("#txtNombre").val();
		var clave  =$("#txtClaveUsuario").val();
		var parametros="opc=guardarUsuario"+
		               "&usuario="+usuario+
                       "&clave="+clave+
                       "&nombre="+nombre+
                       "&aleatorio="+math.random();

		if(usuario!="" && nombre!="" && clave!=""){

		  if(usuario != ""){
			$.ajax({
			cache:false,
			type: "POST",
			datatype:"json",
			url: "php/guardarusuario.php",
			data: parametros,
			success:function(response){
				if (response.respuesta == true){
					

					{
                 },
			error:function(xhr,ajaxOptions,thrownError){
               
			}
		});               
		}

		}else{
			alert ("llene todos los campos");
		}
		

	}

          var Borrar = function(){
          	var usuario = $("#txtNombreUsuario").val();
          	var nombre  = $("txtNombre").val();
          	var pregunta = prompt("segunro que de borrar a "+nombre+"?(si/no","no");

          	if (pregunta != null && pregunta == "si"){
          		//Aqui va el ajax........:)
          	$.ajax({
			cache:false,
			type: "POST",
			datatype:"json",
			url: "php/borrarusuario.php",
			data: parametros,
			success:function(response){
			if (response.respuesta == true){
					

					{
			}
      
          }

    $("#btnAceptar").on("click",Aceptar);
    $("#txtNombreUsuario").on("keypress",teclaNombreUsuario);
    $("#btnGuardar").on("click",Guardar);
    $("#btnBorrar").on("click",borrar);

}
$(document).ready(inicioApp);
<?php
 include("./config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrar Modulo Empresas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/iconocooflaquindio.jpeg">
	<!-- Custom styles for this template-->
  <link href="css/css-empresa.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>ADMINISTRAR EMPRESAS</h1></div>
            <div>
        </div>
        	<div class="col-6">
                <div id="empresas_l"></div>
            </div>
			<div class="form-container">
				<form action=""id="form">
					<h3>empresa</h3>
					    <class class="container">
                        <input type='text' id='Nit_Empresa' value='' placeholder='Ingrese Nit Empresa'>
                        <class class="container">
                        <input type='text' id='Nombre_Empresa' value='' placeholder='Ingrese Nombres'>
					    <class class="container">
                        <input type='text' id='Direccion_Empresa' value='' placeholder='Ingrese Direccion'>
					    <class class="container">
					    <input type='text' id='Telefono_Empresa' value='' placeholder='Ingrese Telefono'>
					    <class class="container">
                        <input type='text' id='Email_Empresa' value='' placeholder='Ingrese Email'>
					    <class class="container">
                        <input type='text' id='idVehiculo_Empresa' value='' placeholder='Ingrese idVehiculo'>
            <div>
                        <input class="alert-info" type="submit" name='AGREGAR_E' onClick='Agregar_E()'value="Agregar Nuevo">
</form>

                    <div id="empresas_2"></div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type='text/javascript'>
function cargar(){
	var parametros = {
			"TIPO":"LISTAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_l').html(a);
			}
		});
}
function Administrar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html(a);
			}
		});
		}
function Agregar_E(){
		var parametros = {
			"NIT_E": $("#Nit_Empresa").val(),
			"NOMBRE_E": $("#Nombre_Empresa").val(),
			"DIRECCION_E": $("#Direccion_Empresa").val(),
			"TELEFONO_E": $("#Telefono_Empresa").val(),
			"EMAIL_E": $("#Email_Empresa").val(),
			"IDVEHICULO_E": $("#idVehiculo_Empresa").val(),

			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Nit_Empresa").val('');
				$("#Nombre_Empresa").val('');
				$("#Direccion_Empresa").val('');
				$("#Telefono_Empresa").val('');
                $("#Email_Empresa").val('');
				$("#idVehiculo_Empresa").val('');
                
			}
		});
		}
function Modificar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"NIT_E": $("#NIT_E").val(),
			"NOMBRE_E": $("#NOMBRE_E").val(),
            "DIRECCION_E": $("#DIRECCION_E").val(),
			"TELEFONO_E": $("#TELEFONO_E").val(),
			"EMAIL_E": $("#EMAIL_E").val(),
			"IDVEHICULO_E": $("#IDVEHICULO_E").val(),
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_E(Nit){
		var parametros = {
			"NIT": Nit,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones4.php",
			data: parametros,
			success: function(a) {
				$('#empresas_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>
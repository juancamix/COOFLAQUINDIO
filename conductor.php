<?php
 include("./config/database.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administracion Modulo Conductores</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/iconocooflaquindio.jpeg">
	<!-- Custom styles for this template-->
  <link href="css/css-conductor.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>MODULO DE CONDUCTORES</h1></div>
            <div>
        </div>
        <div class="row" >
        	<div class="col-6">
                <div id="conductores_l"></div>
            </div> 
			<div class="form-container">
				<form action=""id="form">
					<h3> Ingrese un conductor</h3>
					<class class="container"> 
					<input type='text' id='Cedula_conductor' value='' placeholder='Ingrese Numero de Cedula'>
					<div class ="container">
					<input type='text' id='Nombres_conductor' value='' placeholder='Ingrese Nombres'>
					<div class="container">
					<input type='text' id='Apellidos_conductor' value='' placeholder='Ingrese Apellidos'>
					<div class="container">
					<input type='text' id='Direccion_conductor' value='' placeholder='Ingrese Direccion'>
					<div class="container">
					<input type='text' id='Telefonos_conductor' value='' placeholder='Ingrese Telefonos'>
					<div class="container">
					<input type='text' id='Rh_conductor' value='' placeholder='Ingrese Rh'>
					<div class="container">
					<input type='text' id='Eps_conductor' value='' placeholder='Ingrese Eps'>
            </div>
			<input class="alert-info" type='submit' name='AGREGAR_C' onClick='Agregar_C()'value="Agregar Nuevo">
</form>
                    <div id="conductores_2"></div>

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
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_l').html(a);
			}
		});
}
function Administrar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html(a);
			}
		});
		}
function Agregar_C(){
		var parametros = {
			"CEDULA_C": $("#Cedula_conductor").val(),
			"NOMBRES_C": $("#Nombres_conductor").val(),
			"APELLIDOS_C": $("#Apellidos_conductor").val(),
			"DIRECCION_C": $("#Direccion_conductor").val(),
            "TELEFONO_C": $("#Telefonos_conductor").val(),
			"RH_C": $("#Rh_conductor").val(),
			"EPS_C": $("#Eps_conductor").val(),

			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Cedula_conductor").val('');
				$("#Nombres_conductor").val('');
				$("#Apellidos_conductor").val('');
				$("#Direccion_conductor").val('');
				$("#Telefonos_conductor").val('');
                $("#Rh_conductor").val('');
                $("#Eps_conductor").val('');
			}
		});
		}
function Modificar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"CEDULA_C": $("#CEDULA_C").val(),
			"NOMBRES_C": $("#NOMBRES_C").val(),
            "APELLIDOS_C": $("#APELLIDOS_C").val(),
			"DIRECCION_C": $("#DIRECCION_C").val(),
			"TELEFONO_C": $("#TELEFONO_C").val(),
			"RH_C": $("#RH_C").val(),
			"EPS_C": $("#EPS_C").val(),

			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_C(cedula){
		var parametros = {
			"CEDULA": cedula,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones1.php",
			data: parametros,
			success: function(a) {
				$('#conductores_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>

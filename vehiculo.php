<?php
 include("./config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administracion Modulo vehiculos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/iconocooflaquindio.jpeg">
	<!-- Custom styles for this template-->
  <link href="css/css-vehiculo.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>MODULO DE VEHICULOS</h1></div>
            <div>
        </div>
        	<div class="col-6">
                <div id="vehiculos_l"></div>
            </div>
			<div class="form-container">
				<form action=""id="form">
					<h3> Ingrese un vehiculo</h3>
					    <class class="container">
						<input type='text' id='Numero_Vehiculo' value='' placeholder='Ingrese Numero de Vehiculo'>
						<div class="container">
						<input type='text' id='Tipo_Vehiculo' value='' placeholder='Ingrese Tipo Vehiculo'>	
						<div class="container">
						<input type='text' id='Placa_Vehiculo' value='' placeholder="Ingrese Placa">
						<div class="container">
						<input type='text' id='Modelo_Vehiculo' value='' placeholder="Ingrese Modelo">	
			</div>
			            <input class="alert-info" type="submit" name='AGREGAR_V' onClick='Agregar_V()' value="agregar nuevo">
</form>

        <div id="vehiculos_2"></div>

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
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_l').html(a);
			}
		});
}
function Administrar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html(a);
			}
		});
		}
function Agregar_V(){
		var parametros = {
			"NUMERO_VEHICULO_V": $("#Numero_Vehiculo").val(),
			"TIPO_VEHICULO_V": $("#Tipo_Vehiculo").val(),
			"PLACA_VEHICULO_V": $("#Placa_Vehiculo").val(),
			"MODELO_VEHICULO_V": $("#Modelo_Vehiculo").val(),
			
			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Numero_Vehiculo").val('');
				$("#Tipo_Vehiculo").val('');
				$("#Placa_Vehiculo").val('');
				$("#Modelo_Vehiculo").val('');
				
				
			}
		});
		}
function Modificar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"NUMERO_VEHICULO_V": $("#NUMERO_VEHICULO_V").val(),
			"TIPO_VEHICULO_V": $("#TIPO_VEHICULO_V").val(),
            "PLACA_VEHICULO_V": $("#PLACA_VEHICULO_V").val(),
			"MODELO_VEHICULO_V": $("#MODELO_VEHICULO_V").val(),
			
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_V(Numero_Vehiculo){
		var parametros = {
			"NUMERO_VEHICULO": Numero_Vehiculo,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones2.php",
			data: parametros,
			success: function(a) {
				$('#vehiculos_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>
<center>
 <img src="img/login.png" width="400" height="200" alt="">
</center>
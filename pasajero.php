<?php
 include("./config/database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administracion Modulo Pasajeros</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/iconocooflaquindio.jpeg">
	<!-- Custom styles for this template-->
  <link href="css/css-pasajero.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="cargar()">
<div class="container-contact100">
    <div class="wrap-contact100">
        <div class="row">
        	<div class="col-12" align="center">
        		<div class="sidebar-brand-text"><h1>ADMINISTRAR PASAJEROS</h1></div>
            <div>
        </div>
        	<div class="col-6">
                <div id="pasajeros_l"></div>
            </div>
            <div class="form-container">
                 <form action=""id="form">
					 <h3>ingrese un pasajero</h3>
                            <class class="container">
                            <input type='text' id='Numero_Documento_Pasajero' value='' placeholder='Ingrese Numero Documento'>
							<class class="container">
                            <input type='text' id='Tipo_Documento_Pasajero' value='' placeholder='Ingrese Tipo de Documento'>
							<class class="container">
                            <input type='text' id='Nombres_Pasajero' value='' placeholder='Ingrese Nombres'>
							<class class="container"> 
                            <input type='text' id='Apellidos_Pasajero' value='' placeholder='Ingrese Apellidos'>
							<class class="container"> 
                            <input type='text' id='Origen_Pasajero' value='' placeholder='Ingrese Origen'>
							<class class="container"> 
                            <input type='text' id='Destino_Pasajero' value='' placeholder='Ingrese Destino'>
							<class class="container"> 
                            <input type='text' id='Valor_Pasaje_Pasajero' value='' placeholder='Ingrese Valor del pasaje'>
							<class class="container"> 
                            <input type='text' id='IdVehiculo_Pasajero' value='' placeholder='Ingrese IdVehiculo'>
				<div>
                            <input class="alert-info" type='submit' name='AGREGAR_P' onClick='Agregar_P()'value="Agregar Nuevo">
</form>                          

                    <div id="pasajeros_2"></div>

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
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_l').html(a);
			}
		});
}
function Administrar_P(Numero_Documento){
		var parametros = {
			"NUMERO_DOCUMENTO": Numero_Documento,
			"TIPO":"CARGAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html(a);
			}
		});
		}
function Agregar_P(){
		var parametros = {
			"NUMERO_DOCUMENTO_P": $("#Numero_Documento_Pasajero").val(),
			"TIPO_DOCUMENTO_P": $("#Tipo_Documento_Pasajero").val(),
			"NOMBRES_P": $("#Nombres_Pasajero").val(),
			"APELLIDOS_P": $("#Apellidos_Pasajero").val(),
            "ORIGEN_P": $("#Origen_Pasajero").val(),
			"DESTINO_P": $("#Destino_Pasajero").val(),
			"VALOR_PASAJE_P": $("#Valor_Pasaje_Pasajero").val(),
			"IDVEHICULO_P": $("#IdVehiculo_Pasajero").val(),

			"TIPO":"NUEVO"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				cargar();
				alert("El registro fue creado satisfactoriamente.");
				$("#Numero_Documento_Pasajero").val('');
				$("#Tipo_Documento_Pasajero").val('');
				$("#Nombres_Pasajero").val('');
				$("#Apellidos_Pasajero").val('');
				$("#Origen_Pasajero").val('');
                $("#Destino_Pasajero").val('');
                $("#Valor_Pasaje_Pasajero").val('');
				$("#IdVehiculo_Pasajero").val('');
			}
		});
		}
function Modificar_P(Numero_Documento){
		var parametros = {
			"NUMERO_DOCUMENTO": Numero_Documento,
			"NUMERO_DOCUMENTO_P": $("#NUMERO_DOCUMENTO_P").val(),
			"TIPO_DOCUMENTO_P": $("#TIPO_DOCUMENTO_P").val(),
			"NOMBRES_P": $("#NOMBRES_P").val(),
            "APELLIDOS_P": $("#APELLIDOS_P").val(),
			"ORIGEN_P": $("#ORIGEN_P").val(),
			"DESTINO_P": $("#DESTINO_P").val(),
			"VALOR_PASAJE_P": $("#VALOR_PASAJE_P").val(),
			"IDVEHICULO_P": $("#IDVEHICULO_P").val(),
			
			"TIPO":"MODIFICAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html('');
				cargar();
				alert("El registro ha sido modificado con éxito.");
			}
		});
		}
function Eliminar_P(Numero_Documento){
		var parametros = {
			"NUMERO_DOCUMENTO": Numero_Documento,
			"TIPO":"ELIMINAR"
			}
		$.ajax({
			type: "POST",
			url: "./config/funciones3.php",
			data: parametros,
			success: function(a) {
				$('#pasajeros_2').html('');
				cargar();
				alert("El registro ha sido eliminado con éxito.");
			}
		});
		}
</script>
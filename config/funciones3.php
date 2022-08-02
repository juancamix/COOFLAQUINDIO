<?php
include("database.php");
if ($_POST['TIPO']=="LISTAR"){
	$sql = "SELECT idPasajero,Numero_Documento,Tipo_Documento,Nombres,Apellidos,Origen,Destino,Valor_Pasaje,idVehiculo from pasajero order by idPasajero"; 
    $tabla="<div class='box-body'><table id='detalle1' class='table table-bordered table-striped table-condensed'>
                 <thead>
                        <tr>
                          <th>Numero_Documento</th>
						  <th>Tipo_Documento</th>
						  <th>Nombres</th>
						  <th>Apellidos</th>
						  <th>Origen</th>
						  <th>Destino</th>
						  <th>Valor_Pasaje</th>
						  <th>IdVehiculo</th>

                          <th></th>
                        </tr>
                 </thead>
                 <tbody>";
        $result=mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);
        $datos="";
	if ($count>0) { 
		while($row = mysqli_fetch_row($result)){
                $datos=$datos."<tr>
                    <td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
					<td>".$row[4]."</td>
					<td>".$row[5]."</td>
					<td>".$row[6]."</td>
					<td>".$row[7]."</td>
					<td>".$row[8]."</td>
                    <td>
                       <button type='submit' name='ADMINISTRAR' onClick='Administrar_P(".$row[0].")'>Administrar</button>
                     </td>
                    </tr>";
            }
            $tabla=$tabla.$datos;
            echo $tabla."</tbody></table> <br> <b>Total de Registros: </b>".$count;
			mysqli_close($con);	
	}else{
		echo "<b>No existen pasajeros creados.</b>";
		}
}//FIN FUNCION LISTAR PASAJEROS

if ($_POST['TIPO']=="NUEVO"){
	$sql = "insert into pasajero(Numero_Documento,Tipo_Documento,Nombres,Apellidos,Origen,Destino,Valor_Pasaje,idVehiculo) values('".$_POST['NUMERO_DOCUMENTO_P']."','".$_POST['TIPO_DOCUMENTO_P']."','".$_POST['NOMBRES_P']."','".$_POST['APELLIDOS_P']."','".$_POST['ORIGEN_P']."','".$_POST['DESTINO_P']."','".$_POST['VALOR_PASAJE_P']."','".$_POST['IDVEHICULO_P']."')";
	mysqli_query($con, $sql);
	mysqli_close($con);		
}//FIN FUNCION NUEVO 

if ($_POST['TIPO']=="CARGAR"){ 
$Numero_Documento = $_POST['NUMERO_DOCUMENTO'];
$sql = "select idPasajero,Numero_Documento,Tipo_Documento,Nombres,Apellidos,Origen,Destino,Valor_Pasaje,idVehiculo from pasajero where idPasajero=".$Numero_Documento;
$result=mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
if ($count>0) {
	echo"
	<form-container>

	<form-container>
	";
	while($row = mysqli_fetch_row($result)){
		echo"
			<tr bgcolor='#FFFFFF'>
			<td>
				<b>Numero Documento: </b> <br>
				<input type='text' id='NUMERO_DOCUMENTO_P' value='".$row[1]."'><br>
				<b>Tipo Documento: </b> <br>
				<input type='text' id='TIPO_DOCUMENTO_P' value='".$row[2]."'><br>
				<b>Nombres: </b> <br>
				<input type='text' id='NOMBRES_P' value='".$row[3]."'><br>
				<b>Apellidos: </b> <br>
				<input type='text' id='APELLIDOS_P' value='".$row[4]."'><br>
				<b>Origen: </b> <br>
				<input type='text' id='ORIGEN_P' value='".$row[5]."'><br>
				<b>Destino: </b> <br>
				<input type='text' id='DESTINO_P' value='".$row[6]."'><br>
				<b>Valor Pasaje: </b> <br>
				<input type='text' id='VALOR_PASAJE_P' value='".$row[7]."'><br>
				<b>IdVehiculo: </b> <br>
				<input type='text' id='IDVEHICULO_P' value='".$row[8]."'><br>
			</td>
			</tr>
			<tr bgcolor='#FFFFFF'>
			<td>
				<button type='submit' class='alert-primary' name='MODIFICAR_P' onClick='Modificar_P(".$row[0].")'>Modificar</button>
				<button type='submit' class='alert-warning' name='ELIMINAR_P' onClick='Eliminar_P(".$row[0].")'>Eliminar</button>
			</td>
			</tr>
		";
		}
	echo"
		</table>
		</td>
		</tr>
		</table>
	";	
	}else{
		echo "Error al realizar la consulta en la base de datos. Consulte a soporte técnico.";
		}
mysqli_close($con);
}//FIN FUNCION CARGAR

if ($_POST['TIPO']=="MODIFICAR"){ 
$idPasajero = $_POST['NUMERO_DOCUMENTO'];
$Numero_Documento = $_POST['NUMERO_DOCUMENTO_P'];
$Tipo_Documento = $_POST['TIPO_DOCUMENTO_P'];
$Nombres = $_POST['NOMBRES_P'];
$Apellidos = $_POST['APELLIDOS_P'];
$Origen = $_POST['ORIGEN_P'];
$Destino = $_POST['DESTINO_P'];
$Valor_Pasaje = $_POST['VALOR_PASAJE_P'];
$idVehiculo = $_POST['IDVEHICULO_P'];
$sql = "update pasajero set Numero_Documento='".$Numero_Documento."', Tipo_Documento='".$Tipo_Documento."', Nombres='".$Nombres."', Apellidos='".$Apellidos."', Origen='".$Origen."', Destino='".$Destino."', Valor_Pasaje='".$Valor_Pasaje."', idVehiculo='".$idVehiculo."' where idPasajero=".$idPasajero;
mysqli_query($con, $sql);
mysqli_close($con);	
}//FIN FUNCION MODIFICAR

if ($_POST['TIPO']=="ELIMINAR"){ 
$idPasajero = $_POST['NUMERO_DOCUMENTO'];
$sql = "delete pasajero.* from pasajero where idPasajero=".$idPasajero;
mysqli_query($con, $sql);	
mysqli_close($con);	
}//FIN FUNCION ELIMINAR
?>
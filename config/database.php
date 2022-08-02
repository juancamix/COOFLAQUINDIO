<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bdcooflaquindio"; 

/*Crea la conexion*/

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

/*Check connetion*/

if(!$con) {
   die("connection failed: " . mysqli_connect_error());
}
 ?>
 
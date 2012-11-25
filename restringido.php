<?php 
      
include("datos_de_ensamble.php");
	$conexion = mysql_connect($host,$user,$pw) or die("Se cayo el sistema \n lo sentimos \a ");
	mysql_select_db($db,$conexion) or die("Error al entrar a la base de datos \n");
include("login.php");

if($loginCorrecto)
{
echo "Aqui el contenido solo para usuarios registrados";
}
else
{
echo "El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area";
}
?>
<?php 
include("datos_de_ensamble.php");
	$conexion = mysql_connect($host,$user,$pw) or die("Se cayo el sistema \n lo sentimos \a ");
	mysql_select_db($db,$conexion) or die("Error al entrar a la base de datos \n");
function quitar($mensaje)
{
$mensaje = str_replace("<","<",$mensaje);
$mensaje = str_replace(">",">",$mensaje);
$mensaje = str_replace("\'","'",$mensaje);
$mensaje = str_replace('\"','"',$mensaje);
$mensaje = str_replace("\\\\","\ ",$mensaje);
return $mensaje;
}

if(trim($HTTP_POST_VARS["nick"]) != "" && trim($HTTP_POST_VARS["email"]) != "")
{
$sql = "SELECT ID FROM usuarios WHERE nick='".quitar($HTTP_POST_VARS["nick"])."'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
{
echo "Error, nick escogido por otro usuario";
}
else
{
$sql = "INSERT INTO usuarios (nick,password,nombre,email) VALUES (";
$sql .= "'".quitar($HTTP_POST_VARS["nick"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["password"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["nombre"])."'";
$sql .= ",'".quitar($HTTP_POST_VARS["email"])."'";
$sql .= ")";
mysql_query($sql);
echo "Registro exitoso!";
}
mysql_free_result($result);
}
else
{
echo "Debe llenar como minimo los campos de email y password";
}
mysql_close();
?>
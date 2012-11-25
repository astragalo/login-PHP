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

      

if(trim($HTTP_POST_VARS["nick"]) != "" && trim($HTTP_POST_VARS["password"]) != "")
{
$nickN = quitar($HTTP_POST_VARS["nick"]);
$passN = quitar($HTTP_POST_VARS["password"]);

      

$result = mysql_query("SELECT password FROM usuarios WHERE nick='$nickN'");
if($row = mysql_fetch_array($result))
{
if($row["password"] == $passN)
{
//90 dias dura la cookie
setcookie("usNick",$nickN,time()+7776000);
setcookie("usPass",$passN,time()+7776000);
echo "Ingreso exitoso, ahora sera dirigido a la pagina principal."
?>
<SCRIPT LANGUAGE="javascript">
location.href = "index.php";
</SCRIPT>
<?php
}
else
{
echo "Password incorrecto";
}
}
else
{
echo "Usuario no existente en la base de datos";
}
mysql_free_result($result);
}
else
{
echo "Debe especificar un nick y password";
}
mysql_close();
?>
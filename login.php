<?php 
      $loginCorrecto = false; 
      $idUsuarioL; 
      $nickUsuarioL; 
      $emailUsuarioL; 
      $nombreUsuarioL; 

if(isset($HTTP_COOKIE_VARS["usNick"]) && isset($HTTP_COOKIE_VARS["usPass"]))
{
$result = mysql_query("SELECT * FROM usuarios WHERE nick='".$HTTP_COOKIE_VARS["usNick"]."' AND password='".$HTTP_COOKIE_VARS["usPass"]."'");

if($row = mysql_fetch_array($result))
{
setcookie("usNick",$HTTP_COOKIE_VARS["usNick"],time()+7776000);
setcookie("usPass",$HTTP_COOKIE_VARS["usPass"],time()+7776000);
$loginCorrecto = true;
$idUsuarioL = $row["id"];
$nickUsuarioL = $row["nick"];
$emailUsuarioL = $row["email"];
$nombreUsuarioL = $row["nombre"];
}
else
{
//Destruimos las cookies.
setcookie("usNick","x",time()-3600);
setcookie("usPass","x",time()-3600);
}
mysql_free_result($result);
}
?>
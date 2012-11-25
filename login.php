<?php
include("untitled.php");
session_start();
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die('Cannot select database');
if ($_POST['username']) {
$username=$_POST['username'];
$password=$_POST['password'];
if ($password==NULL) {
echo "La password no fue enviada";
}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
echo "Login incorrecto";
}else{
$query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
$_SESSION["s_username"] = $row['username'];
echo "Has sido logueado correctamente ".$_SESSION['s_username']." y puedes acceder al index.php.";
}
}
}
?>
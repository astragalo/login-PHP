<?php
include("untitled.php");
mysql_connect ($dbhost, $dbusername, $dbuserpass);
mysql_select_db($dbname) or die("Cannot select database");
if (isset($_POST["username"])) {
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) {
echo "un campo está vacio.";
}else{
if($password!=$cpassword) {
echo "Las contraseñas no coinciden";
}else{
$checkuser = mysql_query("SELECT username FROM users WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);
$checkemail = mysql_query("SELECT email FROM users WHERE email='$email'");
$email_exist = mysql_num_rows($checkemail);
if ($email_exist>0|$username_exist>0) {
echo "EL nombre de usuario o la cuenta de correo estan ya en uso";
}else{
$query = "INSERT INTO users (username, password, email) VALUES('$username','$password','$email')";
mysql_query($query) or die(mysql_error());
echo "El usuario $username ha sido registrado de manera satisfactoria.";
}
}
}
}
?>
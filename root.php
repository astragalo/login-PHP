<?php

$query = 'CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
username VARCHAR(30) NOT NULL,
password VARCHAR(20) NOT NULL,
email VARCHAR(40) NOT NULL)';
$result = mysql_query($query);
echo "!Tabla users creada!";

?>
<?php

session_start();

$conn = mysqli_connect(
	'localhost',
	'root',
	'',
	'crud_php_mysql'
);
/*
if(isset($conn)){
	echo 'Conexion exitosa';
}*/
?>
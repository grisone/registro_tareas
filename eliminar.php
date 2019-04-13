<?php

include("db.php");

if(isset($_GET['id'])){
	$id_eliminar = $_GET['id'];
	$query = "DELETE FROM tareas WHERE idtareas = $id_eliminar";
	$resultado = mysqli_query($conn, $query);
	if(!$resultado){
		die("Error");
	}

	$_SESSION['message'] = 'Tarea Eliminada';
	$_SESSION['message_type'] = 'danger';
	header("Location: index.php");
}


?>
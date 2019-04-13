<?php
include("db.php");

	if(isset($_POST['btn_guardar'])){
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "INSERT INTO tareas(titulo, descripcion) VALUES('$titulo', '$descripcion')";
		$resultado = mysqli_query($conn, $query);
		if(!$resultado){
			die('Query Fallida!');
		}

		$_SESSION['message'] = 'Tarea Guardada Satisfactoriamente';
		$_SESSION['message_type'] = 'success';
		header("Location: index.php");
	}

?>
<?php

	include("db.php");

	if(isset($_GET['id'])){
		$id_editar = $_GET['id'];
		$query = "SELECT * FROM tareas WHERE idtareas = $id_editar;";
		$resultado = mysqli_query($conn, $query);
		if(mysqli_num_rows($resultado) == 1){
			$row = mysqli_fetch_array($resultado);
			$titulo = $row['titulo'];
			$descripcion = $row['descripcion'];
			//echo $titulo;
			//echo $descripcion;
		}
	}

	if(isset($_POST['btn_editar'])){
		echo 'Editando';
		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE tareas set titulo ='$titulo', descripcion = '$descripcion' WHERE idtareas = $id";
		mysqli_query($conn, $query);
		$_SESSION['message'] = 'Tarea Editada';
		$_SESSION['message_type'] = 'warning';
		header("Location: index.php");  
	}
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Edita el Título">
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2" class="form-control" placeholder="Edita la Descripción"><?php echo $descripcion; ?></textarea>
					</div>
					<button class="btn btn-success" name="btn_editar">
						Editar
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php") ?>
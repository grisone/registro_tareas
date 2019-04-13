<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">

	<div class="row">
		<div class="col-md-4">


			<?php if(isset($_SESSION['message'])){ ?>

				<div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
  				<?= $_SESSION['message'] ?>
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
				</div>

			<?php session_unset(); } ?>	

			<div class="card card-body">
				<form action="guardar.php" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" class="form-control" placeholder="Título Tarea" autofocus>
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2"
						class="form-control" placeholder="Descripción Tarea"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="btn_guardar" value="Guardar Tarea">
				</form>
			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Título</th>
						<th>Descripción</th>
						<th>Fecha de Creación</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM tareas";
					$resultado_tareas = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($resultado_tareas)){ ?>
						<tr>
							<td><?php echo $row['titulo'] ?></td>
							<td><?php echo $row['descripcion'] ?></td>
							<td><?php echo $row['fechatarea'] ?></td>
							<td>
								<a href="editar.php?id=<?php echo $row['idtareas']?>" class="btn btn-secondary">
									<i class="fas fa-marker"></i>
								</a>
								<a href="eliminar.php?id=<?php echo $row['idtareas']?>" class="btn btn-danger">
									<i class="far fa-trash-alt"></i>
								</a>
							</td>	
						</tr>

					<?php } ?>					
				</tbody>
			</table>
		</div>
		
	</div>

</div>

<?php include("includes/footer.php") ?>

	

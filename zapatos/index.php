<?php 
//INSERT INTO `shoes` (`id`, `name`, `description`, `price`) VALUES ('1', 'DC', 'zapatillas', '900');

function getShoes(){
	$shoes=[];

	$connection	= mysqli_connect("localhost","mario","050983","zapateria");
	$result= mysqli_query($connection, "SELECT * FROM shoes");
	while ($shoe = $result->fetch_array()) {
		$shoes[]=$shoe;
	}
	mysqli_close($connection);
	
	return $shoes;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado de zapatos</title>

	<!-- Latest compiled and minified CSS - Indispensable para el funcionamiento de Boostrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme - agrega estilos a css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="http://localhost/php">Zapateria</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="http://localhost/php/zapatos">Zapatos<span class="sr-only">(current)</span></a></li>
					<li><a href="http://localhost/php/sales">Ventas<span class="sr-only">(current)</span></a></li>
				</ul>
			</div><!-- /.container-fluid -->
		</nav>
		<div class="container">
			<?php 
			if(array_key_exists('error', $_GET)){
				$error=$_GET['error'];
				$title_message ='';
				$body_message='';

				switch ($error) {
					case 'notFoundEdit':
					$title_message = 'Zapato inexistente ';
					$body_message = 'El zapato que se desea editar no se encuentra registrado';
					break;
					
					default:
						# code...
					break;

				}
				if ($title_message) {
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>'.$title_message.'</strong>'. $body_message.'
					</div>';
					
				}
			} ?>
			<h3 class="page-header">
				Listado de zapatos
				<div class="pull-right"><div class="btn-group-sm" role="group" aria-label="...">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#agregarZapato">Agregar zapato</button>

				</div></div>
			</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php $shoes = getShoes(); ?>
					<?php foreach ($shoes as $shoe){ ?>
						<tr>
							<td><?php echo $shoe["id"]; ?></td>
							<td><?php echo $shoe["name"]; ?></td>
							<td><?php echo $shoe["description"]; ?></td>
							<td><?php echo $shoe["price"]; ?></td>
							<td>
								<a href="edit.php?id=<?= $shoe["id"]?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
								<a class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>								
						</tr>
					<?php } ?>


				</tbody>
			</table>	
			<!-- Modal -->
			<div class="modal fade" id="agregarZapato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<form class="form-horizontal" action="add.php" method="POST">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Agragar zapatos</h4>
							</div>
							<div class="modal-body">

								<div class="form-group">
									<label  class="col-sm-2 control-label ">Nombre</label>
									<div class="col-sm-10">
										<input name="name" type="text" class="form-control"  placeholder="Ej: Ricky Sarcany">
									</div>
								</div>

								<div class="form-group">
									<label  class="col-sm-2 control-label">Descripcion</label>
									<div class="col-sm-10">
										<textarea class="form-control" name="description" rows="3"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label  class="col-sm-2 control-label">Precio</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" step=any name="price" placeholder="954.2">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">

									</div>
								</div>




							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</body>
	</html>

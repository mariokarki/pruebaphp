<?php 
//INSERT INTO `shoes` (`id`, `name`, `description`, `price`) VALUES ('1', 'DC', 'zapatillas', '900');

function getShoes(){
	$shoes=[];

	$connection	= mysqli_connect("localhost","mario","050983","zapateria");
	$result= mysqli_query($connection, "SELECT * FROM shoes");
	while ($shoe = $result->fetch_array()) {
		$shoes[]=$shoe;
	}
	
	return $shoes;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba PHP</title>

	<!-- Latest compiled and minified CSS - Indispensable para el funcionamiento de Boostrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme - agrega estilos a css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>N°</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Precio</th>
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
					</tr>
				<?php } ?>


			</tbody>
		</table>	
	</div>

</body>
</html>

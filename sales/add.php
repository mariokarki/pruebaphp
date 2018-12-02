<?php
$connection	= mysqli_connect("localhost","mario","050983","zapateria");

$fecha = $_POST["fecha"];
$cantidad = $_POST["cantidad"];
$shoe_id = $_POST["shoe_id"];

// var_dump($_POST);
// die();

mysqli_query($connection, "INSERT INTO `sales` (`fecha`, `cantidad`, `shoe_id`) VALUES ('$fecha', '$cantidad', '$shoe_id')");

header("Location: index.php");


<?php
$connection	= mysqli_connect("localhost","mario","050983","zapateria");

$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];

mysqli_query($connection, "INSERT INTO `shoes` (`name`, `description`, `price`) VALUES ('$name', '$description', '$price')");

header("Location: index.php");


<?php 

include 'connect.php';
session_start();


if (isset($_SESSION["logged_in"])){
	header("Location ." . "/auth/login");
}

try {
	$sql = "SELECT * FROM Product";
	$s = $pdo->prepare($sql);
	$s->execute();
	$products = $s->fetchAll();
} catch (PDOException $e) {
	echo "An erro happened while showing products.";
}

include 'templates/index.html.php';

?>
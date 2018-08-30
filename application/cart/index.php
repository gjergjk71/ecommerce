<?php

session_start();
include '../connect.php';

try {
	$sql = "SELECT id FROM Cart WHERE user_id=:user_id";
	$s = $pdo->prepare($sql);
	$s->bindValue(":user_id",$_SESSION["logged_in"]);
	$s->execute();
	$carts = $s->fetchAll();
	if ($carts) {
		$cart = $carts[0];
	}
	echo var_dump($cart);
} catch (PDOException $e) {
	echo $e;
}
echo "<br>";

try {
	$sql = "SELECT id,item_id FROM Invoice WHERE cart_id=:cart_id";
	$s = $pdo->prepare($sql);
	$s->bindValue(":cart_id",$cart["id"]);
	$s->execute();
	$invoices = $s->fetchAll();
	echo var_dump($invoices);
} catch (PDOException $e) {
	echo $e;
}

?>
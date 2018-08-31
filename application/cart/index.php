<?php

session_start();
include '../connect.php';
include '../config.php';

if (!$_SESSION["logged_in"]) {
	header("Location: " . constant("PROJECT_INDEX") . "/auth/login");
}

function getCart(PDO $pdo) {
	try {
		$sql = "SELECT id FROM Cart 
				WHERE user_id = :user_id
				AND status = 'open' LIMIT 1";
		$s = $pdo->prepare($sql);
		$s->bindValue(":user_id",$_SESSION["logged_in"]);
		$s->execute();
		$carts = $s->fetchAll();
		if ($carts) {
			return $carts[0];

		} else {
			return False;
		}
	} catch (PDOException $e) {
		echo $e;
	}
}

try {
	$cart = getCart($pdo);
	if (!$cart) {
		$sql = "INSERT INTO Cart(user_id,status)
				VALUES (:user_id,'open')";
		$s = $pdo->prepare($sql);
		$s->bindValue(":user_id",$_SESSION['logged_in']);
		$s->execute();
	}
	$cart = getCart($pdo);
	echo var_dump($cart);
} catch (PDOException $e) {
	echo $e;
}
echo "<br>";

if (isset($_REQUEST["add_item"])) {
	if (is_int("product_id")) {
		$sql = "INSERT INTO Invoice";
	}
}

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
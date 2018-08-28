<?php


if (!isset($_GET["product_id"]) or !$_GET["product_id"] or is_int($_GET["product_id"])) {
	http_response_code(404);
}

include "../connect.php";

try {
	$product_id = $_GET["product_id"];
	$sql = "SELECT id,name,price,description FROM Product
			WHERE id=:product_id";
	$s = $pdo->prepare($sql);
	$s->bindValue(":product_id",$product_id);
	$s->execute();
	$product = $s->fetch();
} catch (PDOException $e) {
	echo "Error while fetching product";
}

try {
	$product_id = $_GET["product_id"];
	$sql = "SELECT id FROM Item
			WHERE product_id=:product_id";
	$s = $pdo->prepare($sql);
	$s->bindValue(":product_id",$product_id);
	$s->execute();
	$items = $s->fetchAll();
} catch (PDOException $e) {
	echo "Error while fetching product items";
}

include "templates/product.html.php";

?>
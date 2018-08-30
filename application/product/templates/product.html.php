<?php include "../config.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product - <?php echo $product["name"] ?></title>
</head>
<body>
	Product Name :  <?php echo $product["name"] ?><br>
	Product Description :  <?php echo $product["description"] ?><br>
	Product Price :  <?php echo $product["price"] ?>$<br>
	Product Items :  <?php echo count($items) ?><br>
	<form method="POST" action="<?php echo constant("PROJECT_INDEX") ?>/cart/?add_invoice=<?php echo $product['id'] ?>">
		<input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
		<input type="submit" value="Add to cart">
	</form>

</body>
</html>
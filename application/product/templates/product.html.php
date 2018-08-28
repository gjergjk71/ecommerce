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
	<input type="submit" value="Purchase">

</body>
</html>
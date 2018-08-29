Products:
<br>
<?php foreach($products as $product): ?>

	<a href="product/?product_id=<?php echo $product["id"] ?>">
		<?php echo $product["name"]; ?> -
		<?php echo $product["price"]; ?>$	
	</a>
	<br>

<?php endforeach ?>
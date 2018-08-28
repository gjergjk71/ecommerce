Products:
<br>
<?php foreach($products as $product): ?>

	<?php echo $product["name"]; ?> -
	<?php echo $product["price"]; ?>$
	<input type="submit" value="Buy">
	<br>

<?php endforeach ?>
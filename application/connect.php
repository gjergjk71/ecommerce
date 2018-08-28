<?php 

$db_name = "ecommerce";
$db_host = "localhost";
$dns = "mysql:dbname={$db_name};dbhost={$db_host}";
$db_username = "root";
$db_password = "gjergji.123";


try {
	$pdo = new PDO($dns,$db_username,$db_password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
	echo $e; //Development only
}

?>
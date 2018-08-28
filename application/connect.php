<?php 

$db_name = "<database_name>";
$db_host = "<database_host>";
$dns = "mysql:dbname={$db_name};dbhost={$db_host}";
$db_username = "<username>";
$db_password = "<password>";


try {
	$pdo = new PDO($dns,$db_username,$db_password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
	echo $e; //Development only
}

?>
<?php

include "../../connect.php";
include "../../config.php";
session_start();

if (isset($_SESSION["logged_in"])) {
	header("Location: " . constant("PROJECT_INDEX"));
} else {
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		include "templates/register.html.php";
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$hashed_password = password_hash($password,PASSWORD_DEFAULT);
		$sql = "INSERT INTO User(username,password)
				VALUES (:username,:password)";
		$s = $pdo->prepare($sql);
		$s->bindValue(":username",$username);
		$s->bindValue(":password",$hashed_password);
		$s->execute();
		header("Location: ../login/" . "?registered");
		echo "DSA";
	}
}
?>
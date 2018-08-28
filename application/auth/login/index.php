<?php

session_start();
include '../../connect.php';

if (isset($_SESSION["logged_in"])) {
	echo "logout";
} else {
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET["invalid"])) {
			$error = "Invalid credentials";
		}
		if (isset($_GET["registered"])) {
			$message = "Successfully registered";
		}
		include 'templates/login.html.php';
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "SELECT id,username,password FROM
				User WHERE username=:username";
		$s = $pdo->prepare($sql);
		$s->bindValue(":username",$username);
		$s->execute();
		$result = $s->fetchAll();
		if ($result) {
			$user = $result[0];
			if (password_verify($password,$user["password"])) {
				$_SESSION["logged_in"] = $user["id"];
				echo "Logged in";
			}
		}
		header("Location: ." . "?invalid");
	}
}
?>
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$name = "reserba";

	$con = mysqli_connect($host, $user, $pass, $name);

	if(!$con) {
		die("Database connection failed " . mysqli_connect_error());
	}

	date_default_timezone_set('Asia/Manila');
	define("IMG_PATH", "/reserba/src/img/");
?>
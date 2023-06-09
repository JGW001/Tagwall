<?php

	$dbHost = "host";
	$dbUser = "user";
	$dbPass = "password";

	$db = "database";

	$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $db) or die(mysqli_error());   
?>
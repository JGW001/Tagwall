<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		include_once('../snippets/connection.php');

		if(strlen($_POST["chatMsg"]) > 3 ) 
		{
			$szIPBuffer = $_SERVER['REMOTE_ADDR'];
	    	$message = $_POST["chatMsg"];
	    	$message = trim($message);
	    	$message = stripslashes($message);
	    	$message = htmlspecialchars($message);
			date_default_timezone_set('Europe/Copenhagen');
			$date = date('m/d/Y', time());
			$time = date('h:i:s', time());

	    	$szQuery = "INSERT INTO `mainChat` (ip, date, time, msg) VALUES ('" . $szIPBuffer . "', '" . $date . "', '" . $time . "', '" . $message . "')";
	    	mysqli_query($connection, $szQuery) or die('WARNING: SOMETHING MESSED UP WITH DB INSERT');
			mysqli_close($connection);
    	}
	}
	else
	{
		return 0;
	}
?>
<head>
<link rel="stylesheet" type="text/css" href="../css/messages.css">
</head>
<?php 
	function parseEmotions ($text)
	{
   		$emoticons = array(
      		":)"  => "😀",
      		":("  => "☹️",
      		":D"  => "😁",
      		":p"  => "😋",
      		":P"  => "😛",
      	);

	   return str_replace(
	     array_keys($emoticons),
	     $emoticons,
	     $text);
	}

	include_once('../snippets/connection.php');

	$sql = "SELECT * FROM mainChat ORDER BY id DESC LIMIT 7";
	$result = mysqli_query($connection, $sql) or die('WARNING: SOMETHING MESSED UP WITH CHAT QUERY');
	while($rs = mysqli_fetch_array($result, MYSQLI_BOTH)) 
	{
		echo '<div class="msgbox-parent">';
		echo '<div class="message">';
		if($rs['userID'] == 1) echo '<div><img src="../images/avatars/avataradmin.png" height="50" width="50"></div>';
		else echo '<div><img src="../images/avatars/avatar.png" height="50" width="50"></div>';
		echo "<div><p>" . parseEmotions ($rs['msg']) . "</p></div>";

		/*echo "<div class='timeanddate'>" . $rs['time'] . "</br>";
		if($rs['userID'] == 1) echo 'Admin';
		else echo "Guest";
		echo '</div>';*/

		echo '</div>';
		echo '</div>';
	}

  mysqli_close($connection);
?>
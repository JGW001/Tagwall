<head>
<link rel="stylesheet" type="text/css" href="css/index.css">

<script>
function trySubmit()
{
    var x = document.forms["myForm"]["chatMsg"];
    if (x.value === "")
    {
        alert(' ERROR: You have not written anything!');
        return false;
    } Blockquote
    return true;
}

function submitForm()
{
    if (trySubmit())
    {
        document.forms["myForm"].submit(); 
        document.forms["myForm"].reset(); 
    }
} 

</script>
</head>

<!DOCTYPE html>
<html>
<body>

<div class="bgimg">
  <div class="topleft">
  </div>

  <div class="middle">
    <h1>Tagwall..</h1>
    <div>
    <iframe src="./content/chat.php" name="frame_chat" height="320" width="500" scrolling="no" style="border:none;"></iframe>
    <iframe src="./content/button.php" name="frame_chatButton" height="0" width="0" style="border:none; "></iframe>
	
	<form action="./content/button.php" method="post" name="myForm" target="frame_chatButton" onsubmit="submitForm()">
    <input type="text" name="chatMsg" minlength="4" onfocus="this.value=''" onfocusout="this.value='Input message..'" value="Input message.." ><br>
	</form>
	</div>
  </div>
  <div class="bottomleft">
    
    <?php
        include_once('snippets/functions.php');
        include_once('snippets/connection.php');

        $szQuery = "INSERT INTO `mainVisitors` (ip, date, browser) VALUES ('" . $_SERVER['REMOTE_ADDR'] . "', '" . date('m/d/Y h:i:s a', time()) . "', '" . getBrowser() . "')";
        mysqli_query($connection, $szQuery) or die(mysqli_error());

        $sql = "SELECT * FROM mainVisitors ORDER BY id DESC LIMIT 0, 1";
        $result = mysqli_query($connection, $sql) or die('WARNING: SOMETHING MESSED UP WITH VISITOR COUNTER');
        while($rs = mysqli_fetch_array($result, MYSQLI_BOTH)) 
        {
            $cname = $rs['id'];
            echo "" . $cname . " page visits";
        }

        mysqli_close($connection);
    ?>
  
  </div>
</div>
</html>
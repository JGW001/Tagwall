<head>
<script src="jquery-3.4.1.min.js"></script>
<script type="text/javascript">
function updateChatAJAx()
{
    var ajaxRequest;  // The variable that makes Ajax possible!
    ajaxRequest = new XMLHttpRequest();
    // Create a function that will receive data sent from the server
    ajaxRequest.onreadystatechange = function()
    {
            if(ajaxRequest.readyState == 4)
            {
                    //The response
                    document.getElementById('MoreID').innerHTML = ajaxRequest.responseText;
                    setTimeout("updateChatAJAx()",250);
            }
    }
    ajaxRequest.open("GET", "getMessages.php", true);
    ajaxRequest.send(null);
}
window.onload = updateChatAJAx;
</script>
</head>

<?php

  echo "<div id='MoreID'>";
  echo "</div>";

?>

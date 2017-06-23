<?php

/*

if ($_SESSION['userid'] == "")

{

	echo "<br><br> <center><b>Session Expired!! / Un-Authorized Access Attempt!!<br><br>Please click <a href='Login.php'>here</a> to log-in";

	exit();

}

*/

session_start();

?>

<script language="javascript"> 

	function fnUnloadHandler() 

	{        

	// Add your code here        

	//alert("Unload event.. Do something to invalidate users session.."); 

	//window.open("CloseSession.asp","","width=200,height=100");

	} 

</script>

<html>

<head>

<title> School Management System - Portal</title>

</head>

        <frameset id="frameset1" frameborder="0" COLS="214">

	      <frame id="RIGHT" name="RIGHT" scrolling="auto" frameborder="0" border="0" src="pages/index.php" noresize>

        </FRAMESET>

        <noframes>

            Your Browser Did Not Support Frames, Pls upgrade your Web Browser to latest version.	

        </noframes>

</html>
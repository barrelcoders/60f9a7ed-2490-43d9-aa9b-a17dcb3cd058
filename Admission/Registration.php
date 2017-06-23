<?php
session_start();

?>
<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
</script>




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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
    <script src="../bootstrap/bootstrap.min.js"></script>

</head>

        <frameset id="frameset1" frameborder="0" COLS="214">

	      <frame id="RIGHT" name="RIGHT" scrolling="auto" frameborder="0" border="0" src="ApplicationForm.php" noresize>

        </FRAMESET>

        <noframes>

            Your Browser Did Not Support Frames, Pls upgrade your Web Browser to latest version.	

        </noframes>

</html>
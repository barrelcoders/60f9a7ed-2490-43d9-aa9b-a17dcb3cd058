<?php
session_start();
// resets the session data for the rest of the runtime
$_SESSION['SelectedAppName']="";
$_SESSION['userid']="";

//$_SESSION = array();
// sends as Set-Cookie to invalidate the session cookie
/*
if (isset($_COOKIE[session_name()])) { 
    $params = session_get_cookie_params();
    setcookie(session_name(), '', 1, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
}
*/

session_destroy();
?>
<html>



<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>New Page 1</title>

</head>



<body>



</body>



</html>



<SCRIPT>

//parent.navigate ("Login.php");

window.parent.location = '../Users/index.php';



//var frameEl = window.frameElement;

// If we are inside a frame, then change its URL to 'http://mozilla.org/'

//if (frameEl) {

  //frameEl.src = 'Login.php';

//}

</SCRIPT>
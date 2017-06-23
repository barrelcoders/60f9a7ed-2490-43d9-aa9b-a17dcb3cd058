<?php
session_start();
include '../connection.php';
date_default_timezone_set('Asia/Calcutta');
$suser=$_REQUEST["txtUserId"];
$spassword=$_REQUEST["txtPassword"];
$currentdate=date("Y-m-d");
$VisitorIPAddress=$_SERVER['REMOTE_ADDR'];
$VisitorIPAddress=get_client_ip_env();
$CurrentTime=date("h:i:sa");

function get_client_ip_env() 
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

if($suser=="Admin")
	{
		$ssql="select `suser`,`spassword` from `admin` where `suser`='$suser'";
	}
	else
	{
	$ssql="select `UserId` as `suser`,`Password` as `spassword` from `employee_master` where `UserId`='$suser'";
	
	}
	$rs= mysql_query($ssql);
	$num_rows=0;
	while($row = mysql_fetch_row($rs))
			{
				$password=$row[1];
				//$StudentName=$row[2];
				//$StudentClass=$row[3];
				//$StudentRollNo=$row[4];
				//$StudentFatherName=$row[5];
				$num_rows=$num_rows+1;
			}
	if($num_rows==0)
	{
		$msg="User Does Not Exist ! Please Try Again";
	}
	else
	{
			if ($spassword==$password)
			{
				//session_register("myusername");
				$_SESSION['userid']=$suser;
				
				$ssql="INSERT INTO `LoginTracking` (`Id`,`Name` , `IPAddress`, `LoginDate`, `LoginTime`) VALUES('$suser','$StudentName','$VisitorIPAddress','$currentdate','$CurrentTime')";
				mysql_query($ssql) or die(mysql_error());
				
				session_write_close();
				header("Location: LandingPage.php");
				exit(0);
			}
			else
			{
							$msg="<br><br><center>Password does not match ! Please Try Again<br>Click <a href='Login.php'>here</a> to re-login!";
							echo $msg;
							exit();
			}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>

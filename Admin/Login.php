<?php
include '../connection.php';
include '../AppConf.php';

session_start(); 
date_default_timezone_set('Asia/Calcutta');
define("ENCRYPTION_KEY", "!@#$%^&*");
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



if ($_REQUEST["isSubmit"]=="yes")
{
	if($suser=="Admin")
	{
		$ssql="select `suser`,`spassword` from `admin` where `suser`='$suser'";
	}
	else
	{
		$ssql="select `UserId` as `suser`,`Password`,`L1_Approver_Id` as `spassword` from `employee_master` where `UserId`='$suser'";
	}
	
	
	$rs= mysql_query($ssql);
	$num_rows=0;
	while($row = mysql_fetch_row($rs))
			{
				$password=$row[1];
				$ApproverID=$row[2];
				$num_rows=$num_rows+1;			
			}
	
	if($num_rows==0)
	{
		$msg="User Does Not Exist ! Please Try Again";
	}
	else
	{
			if($suser=="Admin")
			{
				if (md5($spassword)==$password)
				{
					$_SESSION['userid']=$suser;
					$_SESSION['ApproverId']=$ApproverID;
					//exit();
	
					$ssql="INSERT INTO `LoginTracking` (`Id`,`Name` , `IPAddress`, `LoginDate`, `LoginTime`) VALUES('$suser','$StudentName','$VisitorIPAddress','$currentdate','$CurrentTime')";
					mysql_query($ssql) or die(mysql_error());
					session_write_close();
					//header("Location: Base.php");				
					echo "<script type='text/javascript'>window.location.href = 'Base.php';</script>";
					exit();
					die();
				}
				else
				{
								$msg="Password does not match ! Please Try Again";
				}
			}
			else
			{
				if ($spassword==$password)
				{
					$_SESSION['userid']=$suser;
					$_SESSION['ApproverId']=$ApproverID;
					//exit();
	
					$ssql="INSERT INTO `LoginTracking` (`Id`,`Name` , `IPAddress`, `LoginDate`, `LoginTime`) VALUES('$suser','$StudentName','$VisitorIPAddress','$currentdate','$CurrentTime')";
					mysql_query($ssql) or die(mysql_error());
					session_write_close();
					//header("Location: Base.php");				
					echo "<script type='text/javascript'>window.location.href = 'Base.php';</script>";
					exit();
					die();
				}
				else
				{
								$msg="Password does not match ! Please Try Again";
				}
			}
	}
}
?>


<script language="javascript">
String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ''); };
function Validate()
{
	if(document.getElementById("txtUserId").value.trim()=="")
	{
		alert("Please Enter User Id");
		return;
	}
	if(document.getElementById("txtPassword").value.trim()=="")
	{
		alert("Please Enter Password");
		return;
	}
	document.getElementById("frmLogin").submit();
}
</script>

<html>
<head>

   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" href="../Bootstrap/bootstrap.min.css" />
<script src="../Bootstrap/bootstrap.min.js"></script>

</head>
<style>
 .a .table-responsive {margin-left:5% !important; margin-top:0 !important;  font-size:35px; font-weight:200; color:#FFFFFF !important;}
 .a .table-responsive .img-responsive{ width:60% !important;  }
 ul{ line-height:2 !important; }
 .row{ margin:1% 0% 0 5% !important; } .col-md-4{padding-left:5%; width:36%;} .col-md-4 table {width:100%; height: 72.2%;}
 .col-md-5 .table-responsive{ width:100% !important; background:rgb(249,249,249)!important; margin-left:20%!important; }
 .row .table-responsive .img-responsive{ margin-left:42% !important; margin-top:-4% !important; margin-bottom:3% !important; }
 .col-md-5 .table-responsive tr td{ padding-left:8% !important; }
 .table-responsive .c{ height:40px !important; padding: 10px; border: 1px solid #999; width: 80%; }
 .col-md-5 .table-responsive select{ width:90% !important; line-height:2 !important; height:40px !important;  }
 .btn{ background:rgb(238,177,28) !important; color:#FFFFFF !important;  height:40px !important; width:90% !important }
 .img{height:70%; width:90%}
</style>

<body>

<!--header-->
<div id="container"> 
 <div style="background:rgba(11,70,45,0.6);" class="a">
  <table class="table-responsive"><thead><th>  <img src="images/logo.png" class="img-responsive" />   </th>
  <th>   </th></thead></table>
 </div>
 
<!---Container-->
<div align="right"><a href="../index.php"><img src="images/BackButton.png" width="7%"></a></div>
 <div class="row">
  <div class="col-md-7">
   <img src="images/DPS.jpg" class="img">
  
  </div>
  <div class="col-md-4">
<form name="frmLogin" id="frmLogin" method="post" action="Login.php">
			<font face="Cambria">
			<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
				</font>
   <table class="table-responsive" style="background:rgba(11,70,45,0.1);">
    <thead style="background:rgba(11,70,45,0.84);"><th><img src="images/m.png" class="img-responsive"></th></thead>
    <tr>
     
	 <td align="center">
	   <h3 align="center" style="color:rgba(11,70,45,0.84);">STAFF LOGIN</h3>
	   
		  </br><br>
		  <input type="text" name="txtUserId" id="txtUserId" placeholder="Username" class="c"/></br><br>
		   <input type="password" name="txtPassword" id="txtPassword" placeholder="Password" class="c"/></br><br>
		 <button name="Abutton1" onClick="Javascript:Validate();" class="text-box">
					<font face="Cambria">
					<strong>Login</strong></font></button></br> <br>
		  <input type="checkbox" value="r">&nbsp;&nbsp;Remember me 
		  <a href="ForgotPassword.php" style="margin-left:10%"><u>Forgot Password</u></a><br><br><br>
		 </td>
    </tr>
      <tr>
  <td align="center">
<a href="https://www.facebook.com/search/top/?q=paul%20george%20global%20school"><img src="images/f.png"></a>
<a href="linkline.com"><img src="images/i.png"></a>
<a href="globle.com"><img src="images/w.png"></a>
</td>
</tr>
   </table>
   </form>
  </div>
 </div>
</div>

</body>
</html>

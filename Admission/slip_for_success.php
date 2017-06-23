<?php
session_start();
include '../connection.php';
include '../AppConf.php';
?>

<?php
if(isset($_POST['submit']))
{
$RegistrationNo=$_POST['registrationno'];
$DOB=$_POST['dob'];
//echo "SELECT `RegistrationNo`, `DOB`, `TxnStatus` FROM `NewStudentRegistration_temp` WHERE `RegistrationNo`='$RegistrationNo' AND `DOB`='$DOB'";die();
$data=mysql_query("SELECT `RegistrationNo`, `DOB`, `TxnStatus` FROM `NewStudentRegistration_temp` WHERE `RegistrationNo`='$RegistrationNo' AND `DOB`='$DOB'");
$result=mysql_num_rows($data);
	if($result>0)
	{ ?>
	<script>
    window.location = 'RegistrationFeeResponse_preview.php?registrationno=<?php echo $RegistrationNo; ?>';
	</script>
	<?php } else { ?>
	<script>
    window.location = 'slip_for_success.php';
	</script>
<?php }
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<title>DPS Submition Detail</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
</head>
<style>
body{font-family:Arial;}
#container{margin:7% 23%; line-height:2;  font-size:16px; border:5px groove #0b462d; border-radius:5px; padding:1%;}
#container img{width:60%;} .text-box{border:1px solid #ccc;}
.m{font-size:14px; line-height:1; font-weight:bold;}
.inner{margin:5% 0;} .m1{font-weight:bold;}
.m1, .m2, .m3{text-align:center; font-size:18px; line-height:2; margin:1% 0;}
.m3{font-size:20px; font-weight:900; text-decoration:underline; margin:2% 0; }
.m3 .btn{background:#0b462d; color:#fff; border:1px solid Transparent; border-radius:5px;}
.m3 .btn:hover{background:#097b4d;}
@media only screen and (min-width:400px) and (max-width: 720px){#container{margin:1% 5%; font-size:14px;} #container img{width:90%;} .m{font-size:12px; line-height:1; font-weight:bold;}}
@media only screen and (min-width:200px) and (max-width: 400px){#container{margin:5% 5%; font-size:12px;} #container img{width:90%;} .m{font-size:12px; line-height:1; font-weight:bold;} .inner{margin:15% 0;} .m2{margin:2%; padding:0;}}	
</style>
<body>
 <div id="container">
  <div align="center"><img src="../Admin/images/logo.png"/></div>
  <div align="center" class="m">
    Sector-24, Phase III, Rohini, New Delhi-110085<br>
    Phone No: (011)27055942, 27055943<br>
	Email Id: mail@dpsrohini.com, principal@dpsrohini.com   
  </div>
  <div class="inner">
  
  	<form action="" method="post">
	<div class="m1">Enter Your Registration No.</div>
    	<div class="m2"><input type="text" name="registrationno" id="registrationno" value="" class="text-box"></div>
    	<div class="m1">Date of Birth</div>
    	<div class="m2"><input type="date" name="dob" id="dob" value="" class="text-box"></div>
    	<div class="m3"><input type="submit" name="submit" id="submit" class="btn"></div>
	</form>  
  </div>
 </div>
</body>
</html>

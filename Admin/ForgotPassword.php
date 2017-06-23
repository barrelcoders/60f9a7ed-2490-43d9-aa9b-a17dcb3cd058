<?php
session_start();
include '../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];


$sstr="SELECT distinct `discounttype` FROM `discounttable`";
$rsDiscount= mysql_query($sstr);

if ($SrNo !="")
{
	$ssql="SELECT `srno`, `sname`, `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`, `srollno`, `LastSchool`, `sfathername`, `FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `simei`, `suser`, `spassword`, `email`, `GCMAccountId`,`routeno`,`FeeSubmissionType`,`DiscontType` from `student_master` where `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					
					
					$sadmission=$row[6];
	}
}
	$sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   $ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute, $Con);
if ($_REQUEST["txtName"] !="")
{
	$srno=$_REQUEST["SrNo"];
	
	
	$Admission=$_REQUEST["txtAdmission"];
	
	
			//$ssql="UPDATE `student_master` SET `sname`='$Name',`DOB`='$DOB',`Sex`='$Sex',`Category`='$Category',`Nationality`='$Nationality',`sadmission`='$Admission',`sclass`='$Class',`srollno`='$RollNo',`LastSchool`='$LastSchool',`sfathername`='$FatherName',`FatherEducation`='$FatherEducation',`FatherOccupation`='$FatherOccupation',`MotherName`='$MotherName',`MotherEducation`='$MotherEducation',`Address`='$Address',`smobile`='$Mobile',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$Email',`routeno`='$Route',`FeeSubmissionType`='$FeeSubmissionType',`DiscontType`='$DiscountType' WHERE `srno` = '$srno'";
			mysql_query($ssql) or die(mysql_error());
			//$ssqlU="UPDATE `user_master` SET `sname`='$Name',`sclass`='$Class',`srollno`='$RollNo',`sfathername`='$FatherName',`smobile`='$Mobile',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$Email' WHERE `sadmission`='$Admission'";
			//mysql_query($ssqlU) or die(mysql_error());
			//echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			//exit();
}



?>

<script language="javascript">

function Validate()

{

	

	if (document.getElementById("txtAdmission").value=="")

	{

		alert("Admission is mandatory");

		return;

	}


</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/stylesheet.css" type="text/css" />
<title>Forgot Password</title>
</head>

<body onunload="window.opener.location.reload();">

 <div class="wrapper">
 <form  class="login" name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="ForgotPassword.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

  <img src="images/dpslogo1.png" />
    <p class="title">FORGOT PASSWORD</p>
    
    <input type="text" id="txtAdmission" name="txtAdmission" placeholder="Enter your Addmision Number" autofocus/>
    <i class="fa fa-user"></i>
    
    
    <button>
      <i class="spinner"></i>
      <span class="state"><input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></span>
    </button>
  </form>
 
  </p>
</div>







</body>
</html>

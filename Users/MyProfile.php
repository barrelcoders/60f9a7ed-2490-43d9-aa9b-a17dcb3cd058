<?php include '../connection.php';?>



<?php

session_start();

$StudentClass = $_SESSION['StudentClass'];

$sadmission= $_SESSION['userid'];

if ($sadmission== "")

{

	echo "<br><br><center><b>Your session expired ! or not logged in please login again!";

	exit();

}

//echo "Class:" . $StudentClass . " , RollNo:" . $StudentRollNo;





//$sclass=$_REQUEST['StudentClass'];



//$srollno=$_REQUEST['StudentRollNo'];



	$ssql="SELECT `srno`, `sname`, `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`, `srollno`, `LastSchool`, `sfathername`, `FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `simei`, `suser`, `spassword`, `email`, `GCMAccountId` from student_master where `sclass`='$StudentClass' and `sadmission`='$sadmission'";

	

	$rs= mysql_query($ssql);



	while($row = mysql_fetch_row($rs))

	{



					$srno=$row[0];



					$sname=$row[1];



					$DOB=$row[2];



					$Sex=$row[3];



					$Category=$row[4];



					$Nationality=$row[5];



					$sadmission=$row[6];



					$Class1=$row[7];



					$srollNo=$row[8];



					$sfathername=$row[10];



					$FatherEducation=$row[11];



					$FatherOccupation=$row[12];



					$MotherName=$row[13];



					$MotherEducation=$row[14];



					$Address=$row[15];



					$smobile=$row[16];



					$simei=$row[17];



					$suser=$row[18];



					$spassword=$row[19];



					$email=$row[20];



	}











	$sql = "SELECT distinct `class` FROM `class_master`";



   $result = mysql_query($sql, $Con);



   







if ($_REQUEST["txtName"] !="")

{



	$srno=$_REQUEST["SrNo"];
	$Name=$_REQUEST["txtName"];
	$DOB=$_REQUEST["txtDOB"];
	$Sex=$_REQUEST["txtSex"];
	$Category=$_REQUEST["txtCategory"];
	$Nationality=$_REQUEST["txtNationality"];
	$Admission=$_REQUEST["txtAdmission"];
	$Class=$_REQUEST["cboClass"];
	$RollNo=$_REQUEST["txtRollNo"];
	$FatherName=$_REQUEST["txtFatherName"];
	$FatherEducation=$_REQUEST["txtFatherEducation"];
	$FatherOccupation=$_REQUEST["txtFatherOccupation"];
	$MotherName=$_REQUEST["txtMotherName"];
	$MotherEducation=$_REQUEST["txtMotherEducation"];
	$Address=$_REQUEST["txtAddress"];
	$Mobile=$_REQUEST["txtMobile"];
	$Imei=$_REQUEST["txtImei"];
	$UserId=$_REQUEST["txtUserId"];
	$Password=$_REQUEST["txtPassword"];
	$Email=$_REQUEST["txtEmail"];



			$ssql="UPDATE `student_master` SET `FatherEducation`='$FatherEducation',`FatherOccupation`='$FatherOccupation',`MotherEducation`='$MotherEducation',`Address`='$Address',`smobile`='$Mobile',`simei`='$Imei',`spassword`='$Password',`email`='$Email' WHERE `sadmission` = '$Admission'";

			mysql_query($ssql) or die(mysql_error());
			$ssql1="UPDATE `user_master` SET `smobile`='$Mobile',`simei`='$Imei',`spassword`='$Password',`email`='$Email' WHERE `sadmission` = '$Admission'";
			mysql_query($ssql1) or die(mysql_error());
			
			echo "<br><center> <b>Updated Successfully!";

			exit();	
			}

			?>
	
			<script language="javascript">

			function Validate()

			{

			if (document.get
			ById("txtMobile").value=="")

			{

			alert("Mobile No is mandatory");

			return;
			}

			if (isNaN(document.getElementById("txtMobile").value)==true)
			{
			alert("Mobile No should be numeric");



		return;



	}



	if (document.getElementById("txtAddress").value=="")



	{



		alert("Address is mandatory");

		return;

	}


	document.getElementById("frmMyProfile").submit();

}



</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Daily Classwork and Homework</title>

<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style>
.auto-style2(border:none;)
</style>
</head>
<body>

<!-- ####################################################################################################### -->
  <table width="100%" style="border-width: 0px"> 

<tr>

<td style="border-style: none; border-width: medium">
<div class="wrapper col0">
  <div id="topbar">
    <div id="loginpanel">
      <ul>
        <li class="left">Welcome <?php echo $_SESSION['StudentName'];?></li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel"></a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>

<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><img src="../../Admin/images/logo.png" height="76" width="300" ></img></h1>
    
    </div>
    
    <div id="topnav">
      <ul>
        <li class="active"><a href="Notices.php">Home</a></li>
        <li><a href="Notices.php">Events and Notices</a></li>
        <li><a href="News.php">News</a></li>
		<li><a href="logoff.php">Logout</li>
        <li class="last"></li>
      </ul>
    </div>
    <br class="clear" />
    <br>
  </div>
</div>
</div>


    
<!-- ####################################################################################################### -->

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>»</li>
      <li><a href="Notices.php">Home</a></li>
      <li>»</li>
		<li class="current"><a href="#">My Profile</a></li>
    </ul>
  </div>
</div>


<!-- ######################################Div for News ################################################################# -->

<!--<div class="wrapper col6">
  <div id="breadcrumb">
   
    <font size="3" face="cambria"><b><marquee> Welcome to School Information System ! </b></marquee></font>
    
  </div>
</div>-->

</td>

</tr>

</table>

<table width="100%" border="0">
			<tr>
				<td>
				
	 <div id="column"><?php include 'SideMenu.php'; ?></div>
    </td>
    
    
<!-- #########################################Navigation TD Close ############################################################## -->    

<!-- #########################################Content TD Open ############################################################## -->    


				<td>
			
    
<div>
  <div>
    <div>
     




<b>



<table style="width: 100%" class="auto-style5">



<form name="frmMyProfile" id="frmMyProfile" method="post" action="../Users3/MyProfile.php">



<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">



	<tr>



		<td class="auto-style3" colspan="6" style="border-style:solid; border-width:1px;  background-color:#006400">
		
		<p align="center" style="color:#FFFFFF";>

		<font face="Cambria"><strong>STUDENT DETAILS</strong></font></td>



	</tr>



	<tr>



		<td style="width: 1140px; height: 24px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4">

		<font face="Cambria"><b>Name</b></font></td>
		



		<td style="width: 314px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" readonly="readonly" class="auto-style2" style="border:none"></td>



		<td style="width: 414px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style27">



		<font face="Cambria">Date of Birth</font></td>



		<td style="width: 394px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtDOB" id="txtDOB" type="text" value="<?php echo $DOB; ?>" readonly="readonly" class="auto-style2" style="width: 124px"></td>



		<td style="width: 524px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style27">



		<font face="Cambria">Gender</font></td>



		<td style="width: 524px; height: 24px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<input name="txtSex" id="txtSex" type="text" value="<?php echo $Sex; ?>" readonly="readonly" class="auto-style2"></td>



	</tr>



	<tr>



		<td style="width: 1140px; height: 21px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4"></td>



		<td style="border-style:none; border-width:medium; width: 314px; height: 21px" class="auto-style41">



		</td>



		<td style="border-style:none; border-width:medium; width: 414px; height: 21px" class="auto-style4">



		</td>



		<td style="border-style:none; border-width:medium; width: 394px; height: 21px" class="auto-style41">



		</td>



		<td style="border-style:none; border-width:medium; width: 524px; height: 21px" class="auto-style41">



		</td>



		<td style="width: 524px; height: 21px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		</td>



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4">

		<font face="Cambria">Category</font></td>



		<td style="border-style:none; border-width:medium; width: 314px" class="auto-style41">



		<input name="txtCategory" id="txtCategory" type="text" value="<?php echo $Category; ?>" readonly="readonly" class="auto-style2"></td>



		<td style="border-style:none; border-width:medium; width: 414px" class="auto-style27">



		<font face="Cambria">Nationality</font></td>



		<td style="border-style:none; border-width:medium; width: 394px" class="auto-style41">



		<input name="txtNationality" id="txtNationality" type="text" value="<?php echo $Nationality; ?>" style="height: 22px; width: 122px;" readonly="readonly" class="auto-style2"></td>



		<td style="border-style:none; border-width:medium; width: 524px" class="auto-style41">



		<font face="Cambria">&nbsp;</font></td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



		<td style="width: 1140px; height: 21px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4"></td>



		<td style="border-style:none; border-width:medium; width: 314px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 414px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 394px; height: 21px" class="auto-style41">



		</td>



	



		<td style="border-style:none; border-width:medium; width: 524px; height: 21px" class="auto-style41">



		</td>



	



		<td style="width: 524px; height: 21px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style41">



		</td>



	



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style2">

		<font face="cambria">Admission No.</font></td>



		<td style="width: 314px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input type="text" name="txtAdmission" id="txtAdmission" size="15" value="<?php echo $sadmission; ?>" readonly="readonly" class="auto-style2" style="width: 164px"></td>



		<td style="width: 414px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27">







		<font face="Cambria">Class</font></td>



		<td style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input name="cboClass" id="cboClass" type="text" value="<?php echo $StudentClass; ?>" readonly="readonly" class="auto-style2" style="width: 123px" ></td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style27">







		<font face="Cambria">Roll No.</font></td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style41">







		<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $srollNo; ?>" readonly="readonly" class="auto-style2"></td>



	</tr>



	



	<tr>



		<td class="auto-style50" colspan="6" style="border-bottom-style: solid; border-bottom-width: 1px">

		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



		<td class="auto-style29" colspan="6" style="border-style:solid; border-width:1px; background-color: #006400">



		<p align="center" style="color:#FFFFFF";>



		<font face="Cambria">



		<strong>FAMILY DETAILS</strong></font></td>



	</tr>



	<tr>



		<td class="auto-style16" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">



		<font face="Cambria">Father Name</font></td>



		<td class="auto-style1" style="width: 314px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $sfathername; ?>" readonly="readonly" style="width: 154px" class="auto-style2"></td>



		<td class="auto-style25" style="width: 414px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">






		<font face="Cambria">Father Education</font></td>



		<td class="style5" style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">







		<input name="txtFatherEducation" id="txtFatherEducation" type="text" value="<?php echo $FatherEducation; ?>" style="width: 153px" class="auto-style2"></td>



		<td class="auto-style25" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">







		<font face="Cambria">Father Occupation</font></td>



		<td class="auto-style19" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-bottom-style: none; border-bottom-width: medium">







		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="<?php echo $FatherOccupation; ?>" style="width: 153px" class="auto-style2"></td>



	</tr>



	



	<tr>



		<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17" colspan="6">



		<font face="Cambria">&nbsp;</font></td>



	</tr><tr>



	



	



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17">

		<font face="Cambria">Mother Name</font></td>



		<td style="border-style:none; border-width:medium; width: 314px">



		<input name="txtMotherName" id="txtMotherName" type="text" value="<?php echo $MotherName; ?>" readonly="readonly" style="width: 153px" class="auto-style2"></td>



		<td style="border-style:none; border-width:medium; width: 414px" class="auto-style25">



		<font face="Cambria">Mother Education</font></td>



		<td style="border-style:none; border-width:medium; width: 394px">



		<input name="txtMotherEducation" id="txtMotherEducation" type="text" value="<?php echo $MotherEducation; ?>" style="width: 151px" class="auto-style2"></td>



		<td style="border-style:none; border-width:medium; width: 524px" class="auto-style2">



		&nbsp;</td>



		<td style="width: 524px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style20">



		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



	



	



		<td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style17" colspan="6">

		<font face="Cambria">&nbsp;</font></td>



	</tr>



	



	<tr>



		<td style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px" class="auto-style17">



		<font face="Cambria">Student Address</font></td>



		<td class="auto-style2" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">



		<font face="Cambria">



		<textarea name="txtAddress" id="txtAddress" rows="4" class="auto-style23" style="width: 384px" cols="20"><?php echo $Address; ?></textarea></font></td>



	</tr>



	



<tr>



		<td class="auto-style35" style="border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium" colspan="6">



		&nbsp;</td>



	</tr>



<tr>



		<td class="auto-style22" colspan="6" style="border-style:solid; border-width:1px; background-color: #006400">



		<p align="center" style="color:#FFFFFF";>



		<font face="Cambria">



		<strong>LOGIN CREDENTIALS</strong></font></td>



	</tr>



<tr>



		<td class="auto-style2" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Mobile</td>



		<td class="auto-style1" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $smobile; ?>" style="width: 155px" class="auto-style2" readonly><span class="auto-style2"><br></span></td>
<td style="width: 1140px; height: 24px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium" class="auto-style4">


		<td class="auto-style25" style="width: 394px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-bottom-style:none; border-bottom-width:medium">



		<font face="Cambria">IMEI</font></td>



		<td class="auto-style19" colspan="2" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtImei" id="txtImei" type="text" value="<?php echo $simei; ?>" style="width: 154px" class="auto-style2" readonly></td>



	</tr>



<tr>



		<td class="auto-style28" style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="6">



		&nbsp;</td>



	</tr>



<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		Password</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		<input name="txtPassword" id="txtPassword" type="text" value="<?php echo $spassword; ?>" style="width: 154px" class="auto-style2" readonly></td>



	</tr>



<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		&nbsp;</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">



		&nbsp;</td>



	</tr>



	<tr>



		<td class="auto-style1" style="width: 1140px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:solid; border-bottom-width:1px">



		Email Id</td>



		<td class="auto-style19" colspan="5" style="border-left-style: none; border-left-width: medium; border-right-style: solid; border-right-width: 1px; border-top-style: none; border-top-width: medium; border-bottom-style: solid; border-bottom-width: 1px">



		<input name="txtEmail" id="txtEmail" type="text" value="<?php echo $email; ?>" style="width: 332; height:25" class="auto-style2" readonly></td>



	</tr>



	<tr>



		<td class="auto-style32" style="border-style:none; border-width:medium; " colspan="6">



		&nbsp;</td>



	</tr>



	<tr>



		<td colspan="6" class="style2" style="border-left:medium none #808080; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium">



		<input name="Submit1" type="button" value="Submit" onclick="Javascript:Validate();" class="auto-style26"></td>



	</tr>



	</form>



</table>







		</td>

<!--####################################Content TD close ################################################### -->
    
</tr>

</table>

<div class="wrapper col5">
  <div id="copyright" style="width: 1347px; height: 32px">
    
    <p align="center"><font color="#FFFFFF">Powered By Online School Planet 
	|
	</font>   <a target="_blank" href="http://www.eduworldtech.com" title="Online School Planet">
	<font color="#FFFFFF">Education ERP Platform</font></a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
<?php

session_start();

include '../../connection.php';

?>



<?php

session_start();



$StudentName = $_SESSION['StudentName'];



$StudentClass = $_SESSION['StudentClass'];

$StudentRollNo = $_SESSION['StudentRollNo'];



$class=$_SESSION['StudentClass'];



$SrNo=$_REQUEST["srno"];



if ($SrNo !="")

{

	$ssql="SELECT `srno` , `sname` , `DOB`,`Sex`,``Category,`Nationality`,`sadmission`, ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email` FROM `student_master` WHERE `srno`=$SrNo";

	$rs= mysql_query($ssql);

	while($row = mysql_fetch_row($rs))

	{

					$srno=$row[0];

					$Name=$row[1];

					$DOB=$row[2];

			

					$Sex=$row[3];



					$Category=$row[4];



					$Nationality=$row[5];



					$Admission=$row[6];



					$Class=$row[7];



					$RollNo=$row[8];



					$LastSchool=$row[9];



					$FatherName=$row[10];



					$FatherEducation=$row[11];

					

					$FatherOccupation=$row[12];



					$MotherName=$row[13];

					

					$MotherEducation=$row[14];



					$Address=$row[15];

					

					$smobile=$row[16];

					

					$Imei=$row[17];

					

					$UserId=$row[18];



					$Password=$row[19];



					$email=$row[20];

	}

}



if ($_REQUEST["txtName"] !="")

{

		$srno=$_REQUEST["SrNo"];

		$Admission=$_REQUEST["txtAdmission"];

		$Name=$_REQUEST["txtName"];

		$DOB=$_REQUEST["txtDOB"];

		$Sex=$_REQUEST["txtSex"];

		$Category=$_REQUEST["txtCategory"];

		$Nationality=$_REQUEST["txtNationality"];

		$Class=$_REQUEST["cboClass"];

		$RollNo=$_REQUEST["txtRollNo"];

		$LastSchool=$_REQUEST["txtLastSchool"];

		$Father=$_REQUEST["txtFatherName"];

		$FatherEducation=$_REQUEST["txtFatherEducation"];

		$FatherOccupation=$_REQUEST["txtFatherOccupation"];

		$MotherName=$_REQUEST["txtMotherName"];

		$MotherEducation=$_REQUEST["txtMotherEducation"];

		$Address=$_REQUEST["txtAddress"];

		$MobileNo=$_REQUEST["txtMobile"];

		$Imei=$_REQUEST["txtImei"];

		$UserId=$_REQUEST["txtUserId"];

		$Password=$_REQUEST["txtPassword"];

		$email=$_REQUEST["txtEmail"];

		

	

			$ssql="UPDATE `student_master` SET `sadmission`='$Admission',`sname`='$Name',`DOB`='$DOB',`Sex`='$Sex',`Category`='$Category',`Nationality`='$Nationality',`sclass`='$Class',`srollno`='$RollNo',`LastSchool`='$LastSchool',`sfathername`='$Father',`FatherEducation`='$FatherEducation',`FatherOccupation`='$FatherOccupation',`MotherName`='$MotherName',`MotherEducation`='$MotherEducation',`Address`='$Address',`smobile`='$MobileNo',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$email' WHERE `srno` = '$srno'";

			mysql_query($ssql) or die(mysql_error());

			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";

			exit();



}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtName").value=="")

	{

		alert("Name is mandatory");

		return;

	}

	if (document.getElementById("txtDOB").value=="")

	{

		alert("Date Of Birth is mandatory");

		return;

	}

	if (document.getElementById("txtSex").value=="")

	{

		alert("Student Sex Type is mandatory");

		return;

	}

	if (document.getElementById("txtAdmission").value=="")

	{

		alert("Admission is mandatory");

		return;

	}

	if (document.getElementById("txtRollNo").value=="")

	{

		alert("Roll No is mandatory");

		return;

	}

	if (document.getElementById("txtFatherName").value=="")

	{

		alert("Father's name is mandatory");

		return;

	}

	if (document.getElementById("txtMobile").value=="")

	{

		alert("Mobile No is mandatory");

		return;

	}

	if (document.getElementById("txtAddress").value=="")

	{

		alert("Address is mandatory");

		return;

	}

	if (document.getElementById("cboClass").value=="")

	{

		alert("Mobile No is mandatory");

		return;

	}

	if (document.getElementById("txtUserId").value=="")

	{

		alert("User Id. is mandatory");

		return;

	}

	if (document.getElementById("txtPassword").value=="")

	{

		alert("Password is mandatory");

		return;

	}

	if (document.getElementById("txtEmail").value=="")

	{

		alert("Email is mandatory");

		return;

	}

	document.getElementById("frmEditStudentMaster").submit();

	

}
<link rel="stylesheet" type="text/css" href="tcal.css" />

<script type="text/javascript" src="tcal.js">

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Student Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}


.style3 {

	color: #FFFFFF;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

}

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #FFFFFF;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

.auto-style1 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.auto-style2 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="EditStudentMaster.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Admission</strong>:</td>

		<td style="width: 524px">



		<input type="text" name="txtAdmission" id="txtAdmission" size="15" style="font-family: Arial; color: #CC0033" value="<?php echo $sadmission; ?>"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Date of Birth:</strong></td>

		<td style="width: 524px">

		<input name="txtDOB" id="txtName" type="text" class="tcal" value="<?php echo $DOB; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Sex:</strong></td>

		<td style="width: 524px">

		<input name="txtSex" id="txtSex" type="text" value="<?php echo $Sex; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Category</strong></td>

		<td style="width: 524px">

		<input name="txtCategory" id="txtCategory" type="text" value="<?php echo $Category; ?>"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Nationality</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $Nationality; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Class:</strong></td>

		<td style="width: 524px">

		<select name="cboClass" id="cboClass" style="height: 22px">

		<option <?php if ($Class=="All") {?> selected="selected" <?php } ?> value="All">All</option>

		<option <?php if ($Class=="1") {?> selected="selected" <?php } ?> value="1">1st</option>

		<option <?php if ($Class=="2") {?> selected="selected" <?php } ?> value="2">2nd</option>

		<option <?php if ($Class=="3") {?> selected="selected" <?php } ?> value="3">3rd</option>

		<option <?php if ($Class=="4") {?> selected="selected" <?php } ?> value="4">4th</option>

		<option <?php if ($Class=="5") {?> selected="selected" <?php } ?> value="5">5th</option>

		<option <?php if ($Class=="6") {?> selected="selected" <?php } ?> value="6">6th</option>

		<option <?php if ($Class=="7") {?> selected="selected" <?php } ?> value="7">7th</option>

		<option <?php if ($Class=="8") {?> selected="selected" <?php } ?> value="8">8th</option>

		<option <?php if ($Class=="9") {?> selected="selected" <?php } ?> value="9">9th</option>

		<option <?php if ($Class=="10") {?> selected="selected" <?php } ?> value="10">10th</option>

		<option <?php if ($Class=="11") {?> selected="selected" <?php } ?> value="11">11th</option>

		<option <?php if ($Class=="12") {?> selected="selected" <?php } ?> value="12">12th</option>

		</select></td>

	</tr>

	<tr>

		<td class="auto-style1">

		<strong>Roll No.</strong></td>

		<td class="style5">

		<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $RollNo; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Last School Attended</strong></td>

		<td style="width: 524px">

		<input name="txtLastSchool" id="txtLastSchool" type="text" value="<?php echo $LastSchool; ?>"></td>

	</tr>

	

<tr>

		<td class="auto-style1">

		<strong>Father Name:</strong></td>

		<td class="style5">



		<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $FatherName; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Father Education</strong></td>

		<td style="width: 524px">

		<input name="txtFatherEducation" id="txtFatherEducation" type="text" value="<?php echo $FatherEducation; ?>"></td>

	</tr><tr>

	

	

		<td style="width: 523px" class="auto-style2"><strong>Father Occupation</strong></td>

		<td style="width: 524px">

		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="<?php echo $FatherOccupation; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Mother Name</strong></td>

		<td style="width: 524px">

		<input name="txtMotherName" id="txtMotherName" type="text" value="<?php echo $MotherName; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Mother Education</strong></td>

		<td style="width: 524px">

		<input name="txtMotherEducation" id="txtMotherEducation" type="text" value="<?php echo $MotherEducation; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="auto-style2"><strong>Student Address</strong></td>

		<td style="width: 524px">

		<input name="txtAddress" id="txtAddress" type="text" value="<?php echo $Address; ?>"></td>

	</tr>

	

<tr>

		<td class="auto-style1">

		<strong>Mobile:</strong></td>

		<td class="style5">

		<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $Mobile; ?>"></td>

	</tr>

<tr>

		<td class="auto-style1">

		<strong>IMEI:</strong></td>

		<td class="style5">

		<input name="txtImei" id="txtImei" type="text" value="<?php echo $Imei; ?>"></td>

	</tr>

<tr>

		<td class="auto-style1">

		<strong>User Id.:</strong></td>

		<td class="style5">



		<input name="txtUserId" id="txtUserId" type="text" value="<?php echo $UserId; ?>"></td>

	</tr>

<tr>

		<td class="auto-style1">

		<strong>Password:</strong></td>

		<td class="style5">

		<input name="txtPassword" id="txtPassword" type="text" value="<?php echo $Password; ?>"></td>

	</tr>

	<tr>

		<td class="auto-style1">

		<strong>Email:</strong></td>

		<td class="style5">

		<input name="txtEmail" id="txtEmail" type="text" value="<?php echo $Email; ?>"></td>

	</tr>

	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>


</body>



</html>

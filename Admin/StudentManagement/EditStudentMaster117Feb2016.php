<?php
session_start();
include '../../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];


$sstr="SELECT distinct `head` FROM `discounttable`";
$rsDiscount= mysql_query($sstr);

if ($SrNo !="")
{
	$ssql="SELECT `srno`, `sname`, `DOB`, `Sex`, `Category`, `Nationality`, `sadmission`, `sclass`, `srollno`, `LastSchool`, `sfathername`, `FatherEducation`, `FatherOccupation`, `MotherName`, `MotherEducation`, `Address`, `smobile`, `simei`, `suser`, `spassword`, `email`, `GCMAccountId`,`routeno`,`FeeSubmissionType`,`DiscontType`,`Remarks` from `student_master` where `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$sname=$row[1];
					$DOB=$row[2];
					
					//yyyy-mm-dd
					//mm/dd/yyyy
					$arr=explode('-',$DOB);
					$DOB=  $arr[1]. "/" . $arr[2] . "/" . $arr[0];
	
					$Sex=$row[3];
					$Category=$row[4];
					$Nationality=$row[5];
					$sadmission=$row[6];
					$Class1=$row[7];
					$srollNo=$row[8];
					$LastSchool=$row[9];
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
					$Route=$row[22];
					$FeeSubmissionType=$row[23];
					$DiscontType=$row[24];
					$Remarks=$row[25];
	}
}
	$sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   $ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute, $Con);
if ($_REQUEST["txtName"] !="")
{
	$srno=$_REQUEST["SrNo"];
	$Name=$_REQUEST["txtName"];
	//$DOB=$_REQUEST["txtDOB"];
	$Dt = $_REQUEST["txtDOB"];
	$arr=explode('/',$Dt);
	$DOB= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	$Sex=$_REQUEST["txtSex"];
	$Category=$_REQUEST["txtCategory"];
	$Nationality=$_REQUEST["txtNationality"];
	$Admission=$_REQUEST["txtAdmission"];
	//$Class=$_REQUEST["cboClass"];
	$Class=$_REQUEST["txtClass"];
	$RollNo=$_REQUEST["txtRollNo"];
	$LastSchool=$_REQUEST["txtLastSchool"];
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
	$Route=$_REQUEST["cboRoute"];
	$FeeSubmissionType=$_REQUEST["cboFeeSubmissionType"];
	$currentdatetime=date("Y-m-d h:i:sa");
	$DiscountType=$_REQUEST["cboDiscountType"];
	$Remarks=$_REQUEST["txtRemarks"];
			$ssql="UPDATE `student_master` SET `sname`='$Name',`DOB`='$DOB',`Sex`='$Sex',`Category`='$Category',`Nationality`='$Nationality',`sadmission`='$Admission',`sclass`='$Class',`srollno`='$RollNo',`LastSchool`='$LastSchool',`sfathername`='$FatherName',`FatherEducation`='$FatherEducation',`FatherOccupation`='$FatherOccupation',`MotherName`='$MotherName',`MotherEducation`='$MotherEducation',`Address`='$Address',`smobile`='$Mobile',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$Email',`routeno`='$Route',`FeeSubmissionType`='$FeeSubmissionType',`DiscontType`='$DiscountType', `Remarks`='$Remarks' WHERE `srno` = '$srno'";
			mysql_query($ssql) or die(mysql_error());
			$ssqlU="UPDATE `user_master` SET `sname`='$Name',`sclass`='$Class',`srollno`='$RollNo',`sfathername`='$FatherName',`smobile`='$Mobile',`simei`='$Imei',`suser`='$UserId',`spassword`='$Password',`email`='$Email' WHERE `sadmission`='$Admission'";
			mysql_query($ssqlU) or die(mysql_error());
			mysql_query("update `update_track` set `UpdateDateTime`='$currentdatetime' where `Activity`='ApplicationUpdate'") or die(mysql_error());;
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

	/*

	if (document.getElementById("txtImei").value=="")

	{

		alert("IMEI is mandatory");

		return;

	}

	*/

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

function FillClass()

{

	document.getElementById("txtClass").value=document.getElementById("cboClass").value;

}

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

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

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

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditStudentMaster" id="frmEditStudentMaster" method="post" action="EditStudentMaster1.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Date of Birth:</strong></td>

		<td style="width: 524px">

		<input name="txtDOB" id="txtDOB" class="tcal" type="text" value="<?php echo $DOB; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Sex:</strong></td>

		<td style="width: 524px">

		<input name="txtSex" id="txtSex" type="text" value="<?php echo $Sex; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Category</strong></td>

		<td style="width: 524px">

		<input name="txtCategory" id="txtCategory" type="text" value="<?php echo $Category; ?>"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Nationality</strong></td>

		<td style="width: 524px">

		<input name="txtNationality" id="txtNationality" type="text" value="<?php echo $Nationality; ?>" style="height: 22px"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Admission</strong>:</td>

		<td style="width: 524px">



		<input type="text" name="txtAdmission" id="txtAdmission" size="15" style="font-family: Arial; color: #CC0033" value="<?php echo $sadmission; ?>"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Class:</strong></td>

		<td style="width: 524px">

		<input name="txtClass" id="txtClass" type="text" value="<?php echo $Class1; ?>" readonly="readonly">

		<select name="cboClass" id="cboClass" style="height: 22px" onchange="Javascript:FillClass();">

		

		<?php

				while($row = mysql_fetch_assoc($result))

   				{

   					$class=$row['class'];

			?>

			<option value="<?php echo $class; ?>" <?php if ($class==$Class1) { ?> selected="selected" <?php } ?>><?php echo $class; ?></option>

			<?php

				}

			?>

		</select></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Roll No.:</strong></td>

		<td class="style5">

		<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $srollNo; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Last School:</strong></td>

		<td class="style5">



		<input name="txtLastSchool" id="txtLastSchool" type="text" value="<?php echo $LastSchool; ?>"></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>Father Name:</strong></td>

		<td class="style5">



		<input name="txtFatherName" id="txtFatherName" type="text" value="<?php echo $sfathername; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Father Education</strong></td>

		<td style="width: 524px">

		<input name="txtFatherEducation" id="txtFatherEducation" type="text" value="<?php echo $FatherEducation; ?>"></td>

	</tr><tr>

	

	

		<td style="width: 523px" class="style3"><strong>Father Occupation</strong></td>

		<td style="width: 524px">

		<input name="txtFatherOccupation" id="txtFatherOccupation" type="text" value="<?php echo $FatherOccupation; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Mother Name</strong></td>

		<td style="width: 524px">

		<input name="txtMotherName" id="txtMotherName" type="text" value="<?php echo $MotherName; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Mother Education</strong></td>

		<td style="width: 524px">

		<input name="txtMotherEducation" id="txtMotherEducation" type="text" value="<?php echo $MotherEducation; ?>"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Student Address</strong></td>

		<td style="width: 524px">

		<input name="txtAddress" id="txtAddress" type="text" value="<?php echo $Address; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Mobile:</strong></td>

		<td class="style5">

		<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $smobile; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>IMEI:</strong></td>

		<td class="style5">

		<input name="txtImei" id="txtImei" type="text" value="<?php echo $simei; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>User Id.:</strong></td>

		<td class="style5">



		<input name="txtUserId" id="txtUserId" type="text" value="<?php echo $suser; ?>"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Password:</strong></td>

		<td class="style5">

		<input name="txtPassword" id="txtPassword" type="text" value="<?php echo $spassword; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Email:</strong></td>

		<td class="style5">

		<input name="txtEmail" id="txtEmail" type="text" value="<?php echo $email; ?>"></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Route:</strong></td>

		<td class="style5">

		<select name="cboRoute" id="cboRoute">

		<option selected="" value="">Select One</option>

		<?php

		while($row1 = mysql_fetch_row($rsRoute))

		{

					$Route1=$row1[0];

		?>

		<option value="<?php echo $Route1; ?>" <?php if ($Route1==$Route) { ?> selected="selected" <?php } ?>><?php echo $Route1; ?></option>

		<?php

		}



		?>

		</select></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Fee Submission Type:</strong></td>

		<td class="style5">

		<select name="cboFeeSubmissionType" id="cboFeeSubmissionType">
		<option selected="">Select One</option>
		<option value="Monthly" <?php if ($FeeSubmissionType=="Monthly") { ?> selected="selected" <?php } ?> >Monthly</option>
		<option value="Quarterly" <?php if ($FeeSubmissionType=="Quarterly") { ?> selected="selected" <?php } ?> >Quarterly</option>
		</select></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>Discount Type:</strong></td>

		<td class="style5">

		<select name="cboDiscountType" id="cboDiscountType">
		<option selected="" value="">Select One</option>
		<?php
				while($row = mysql_fetch_row($rsDiscount))
				{
				?>
				<option value="<?php echo $row[0];?>" <?php if ($DiscontType==$row[0]) {?> selected="selected" <?php } ?> ><?php echo $row[0];?></option>
				<?php
				}
				?>
		</select>
		</td>

	</tr>

	<tr>

		<td class="style4">

		<b>Remarks</b></td>

		<td class="style5">

		<input type="text" name="txtRemarks" id="txtRemarks" size="20" value="<?php echo $Remarks; ?>"></td>

	</tr>

	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Search Student In User Master</title>
</head>

<body>

<?php
//session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `srno`, `sname`, `sadmission`, `sclass`, `srollno`, `sfathername`, `smobile`, `simei`, `suser`, `spassword`, `email`, `GCMAccountId`, `status`, `FinancialYear`, `sVersionCode` FROM `user_master` WHERE 1=1";
		
	
	if ($_REQUEST["txtAdmissionId"] !="")
	{
		$AddmissionId=$_REQUEST["txtAdmissionId"];
		$ssql = $ssql . " and `sadmission`='$AddmissionId'";
	}
	else
	{
		if ($_REQUEST["cboClass"] != "All")
		{
			$SelectedClass=$_REQUEST["cboClass"];
			$ssql = $ssql . " and `sclass`='$SelectedClass'";
			
			if ($_REQUEST["txtRollNo"] != "")
			{	
				$EnteredRollNo=$_REQUEST["txtRollNo"];
				$ssql = $ssql . " and `srollno`='$EnteredRollNo'";
			}
			else
			{
				if ($_REQUEST["txtStudentName"] != "")
				{
					$StudentName=$_REQUEST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
			}
			
		}
		else
		{
			if ($_REQUEST["txtStudentName"] != "")
				{
					$StudentName=$_REQUEST["txtStudentName"];
					$ssql = $ssql . " and `sname` like '%" . $StudentName . "%'";
				}
		}
		
	}

	$rs= mysql_query($ssql);
}


$num_rows=0;

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");

?>

<script language="javascript">

function ShowEdit(SrNo)
{
	//window.open "EditHoliday.php?srno" . SrNo;
	var myWindow = window.open("EditStudentMaster1.php?srno=" + SrNo ,"","width=700,height=650");
}
function ChangeMobileNo(sadmission)
{
	var myWindow = window.open("ChangeMobileNo.php?sadmission=" + sadmission ,"","width=700,height=400");
}

function Validate2()
{
	document.getElementById("frmStudentMaster").submit();
}
function ChangeClass(sadmission,sclass)
{
	var myWindow = window.open("ChangeClassSection.php?sadmission=" + sadmission + "&MyClass=" + sclass ,"","width=700,height=400");
}



</script>



<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Search Student</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js"></script>

	

<style type="text/css">

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

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

{

        height:20px; 

        width: 100%; 

        margin:auto;        

        background-color:Blue;

        font-family: Calibri;

        font-weight:bold;

}



.style3 {

	text-decoration: none;

}

.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	
	font-family: Cambria;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style1 {
	
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	}

.style11 {
	border-width: 1px;
}
.style12 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
	font-weight: bold;
}

.auto-style10 {
	
	text-align: right;
}

.auto-style11 {
	

	text-align: left;
	font-family: Cambria;
	color: #000000;
}
.auto-style12 {
	
	text-align: left;
}

.auto-style13 {
	color: #000000;
}
.auto-style15 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none underline;
}
.auto-style16 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
}
.auto-style17 {
	border-style: none;
	border-width: medium;
	color: #000000;
}
.auto-style18 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style19 {
	border-collapse: collapse;
	border-width: 0;
}

.auto-style5 {
	text-align: left;
	font-family: Calibri;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}

.auto-style20 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 15px;
	color: #000000;
}

</style>

</head>



<body>


<table width="100%" cellspacing="1" height="80" bordercolor="#000000" id="table1" class="auto-style19">

		<tr>

		<td>

		<table border="1" width="100%" id="table2" bordercolor="#000000" class="auto-style18">

			<tr>

				<td class="auto-style17">
<p class="auto-style5" style="height: 12px">&nbsp;</p>
<p class="auto-style5" style="height: 12px"><font face="Cambria" size="3">
<strong>Search Student in User Master</strong></font></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img src="images/BackButton.png" style="float: right" height="20"></a></p>
				
				</table>
	
	<table class="auto-style7" style="width: 100%">
		<form name="frmStudentMaster" id="frmStudentMaster" method="post" action="SearchStudentUserMaster.php">
	<font face="Cambria">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	</font>
	
	<td class="auto-style6" style="width: 192px">
				Search By</td>
	
	<td class="auto-style1" style="width: 99px">
				Admission No</td>
	
	<td style="width: 149px" class="auto-style13">
				<font face="Cambria">
				<input name="txtAdmissionId" id="txtAdmissionId" class="text-box" type="text"></font></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td class="auto-style6" colspan="2">







				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			<tr>
	
	<td class="auto-style6" style="width: 192px">
				&nbsp;</td>
	
	<td class="auto-style15" style="width: 99px"></td>
	
	<td style="width: 149px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search By Class</td>
	
	<td style="width: 99px" class="auto-style12">
				<span style="text-decoration:none;" class="auto-style3">Select 
				Class</span><span style="font-family:Cambria;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826">
	</span></td>
	
	<td style="width: 150px" class="auto-style13">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" class="text-box" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></font></span></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				<span class="auto-style3"><span style="text-decoration: none">
				Search By Roll No</span></span></td>
	
	<td style="width: 78px" class="auto-style13">
				<span style="text-decoration: none" class="auto-style3">Roll No:</span></td>
	
	<td style="width: 365px" class="auto-style13">
				<font face="Cambria">
				<input name="txtRollNo" id="txtRollNo" type="text" class="text-box"></font></td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style11">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				Search By Name</td>
	
	<td style="width: 99px" class="auto-style16">
				<p style="text-align: left"><span style="text-decoration: none">
				Name</span></td>
	
	<td style="width: 150px" class="auto-style13">
				<font face="Cambria">
				<input name="txtStudentName" id="txtStudentName" type="text" class="text-box"></font></td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style11">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style11">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
			<tr>
	
	<td style="width: 192px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 99px" class="auto-style10">
				<font face="Cambria">
				<input name="Button1" type="button" value="Submit" class="text-box" onclick ="Javascript:Validate2();"></font></td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 63px" class="auto-style6">
				&nbsp;</td>
	
	<td style="width: 166px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 78px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 365px" class="auto-style13">
				&nbsp;</td>
	
	<td style="width: 150px" class="auto-style13">
				&nbsp;</td>
			</tr>
	</form>
	</table>
	
	&nbsp;<table  id="table3" class="CSSTableGenerator">

			<tr>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; color: #000000">

				Sr. No.</span></td>
				
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Student Name</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Admission</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Class</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Roll No</td>
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 55px" class="style12">

				Nationality</td>
				-->
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Father's Name</td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Mobile</td>
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				SIMEI</td>
				
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				LastSchool</td>
				-->
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				User Name</td>
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Father's Education</td>
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Father's Occupation</td>
				-->
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				Password</td>

				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="style12">

				Mother's Education</td>
				-->
				
				
				
				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="style12">

				<strong>Email </strong></td>
				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">
				<strong>IMEI</strong></td>
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>User Id</strong></td>

				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>Password </strong></td>
				
-->
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<b>GCM Account ID</b></td>
				

				<td height="35" bgcolor="#95C23D" align="center" style="width: 95px" class="auto-style20">

				<strong>Status </strong></td>

				<!--
				<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

				<strong>Fee Payment Mode</strong></td>
				
					<td height="35" bgcolor="#95C23D" align="center" style="width: 56px" class="auto-style20">

					<strong>Fee Discount Type</strong></td>
				-->

				<td height="35" bgcolor="#95C23D" align="center" style="width: 96px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				Financial Year</span></td>
				<td height="35" bgcolor="#95C23D" align="center" style="width: 96px" class="style11">

				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				S Version Code</span></td>

							</tr>

			<?php
				$record_count=0;
				while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$record_count=$record_count+1;
					$Name=$row[1];
					$Admission=$row[2];
					$Class=$row[3];
					$RollNo=$row[4];
					$FatherName=$row[5];
					$smobile=$row[6];
					$Imei=$row[7];
				    $UserId=$row[8];
					$Password=$row[9];
					$email=$row[10];
					$GCMAccountId=$row[11];
					$status=$row[12];
					$FinancialYear=$row[13];
					$sVersionCode=$row[14];
				
					$num_rows=$num_rows+1;

			?>

			<tr>

				<td height="35" align="center" style="width: 42px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $record_count; ?></span></td>
								
				<td height="35" align="center" style="width: 95px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Name; ?></span></td>
						
				<td height="35" align="center" style="width: 95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">

				<?php echo $Admission; ?></span></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">
				
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<a href="Javascript:ChangeClass('<?php echo $Admission;?>','<?php echo $Class; ?>');"><?php echo $Class; ?></a>	</span></td>
				
				
				<td height="35" align="center" style="width: 56px" class="style11">
				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<?php echo $RollNo; ?></span></td>
				
				<td height="35" align="center" style="width: 95px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				
				<?php echo $FatherName; ?></td>
			
			    <td height="35" align="center" style="width: 95px" class="style11">

				<span style="font-family: Cambria; font-size: 15px; font-weight: normal; font-style: normal; text-decoration: none; color: #000000">
				<a href="Javascript:ChangeMobileNo('<?php echo $Admission;?>');">
				<?php echo $smobile;?></a></td>
				
				<td height="35" align="center" style="width: 56px" class="style11">
				<font face="Cambria">
				<?php echo $Imei; ?></font></td>
				
				<td height="35" align="center" style="width: 56px" class="style11">

				<font face="Cambria">

				<?php echo $UserId; ?></font></td>

				<td height="35" align="center" style="width: 56px" class="style11">

				<font face="Cambria">

				<?php echo $Password; ?></font></td>
				

				<td height="35" align="center" style="width: 56px" class="style11">

				<font face="Cambria">

				<?php echo $email; ?></font></td>
				

				<td height="35" align="center" style="width: 95px" class="style11">

				<font face="Cambria">

				<?php echo $GCMAccountId; ?></font></td>
				
				<td height="35" align="center" style="width: 56px" class="style11">

				<font face="Cambria">

				<?php  echo $status; ?></font></td>

<td height="35" align="center" style="width: 56px" class="style11">

			<font face="Cambria">

			<?php 	echo $FinancialYear; ?></font></td>
			

				<td height="35" align="center" style="width: 96px" class="style11">

				<font face="Cambria">

			<?php 	echo $sVersionCode; ?></font></td>

				</tr>

			<?php

			}

			?>

			
		</table>

		</td>

		<td>

		&nbsp;</td>

	</tr>

</table>
<?php include"footer.php";?>

<!--<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>-->


</body>



</html></body>

</html>
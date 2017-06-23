<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
session_start();

$suser=$_REQUEST["txtUserId"];

$spassword=$_REQUEST["txtPassword"];

if ($_REQUEST["isSubmit"]=="yes")
{
	//$rs = mysql_query("select `suser`,`spassword` from `student_master` where `suser`='$suser'");

	$ssql="select `suser`,`spassword`,`sname`,`sclass`,`srollno`,`sfathername` from `student_master` where `sadmission`='$suser'";

	$rs= mysql_query($ssql);

	$num_rows=0;

	while($row = mysql_fetch_row($rs))
			{
				$password=$row[1];
				$StudentName=$row[2];
				$StudentClass=$row[3];
				$StudentRollNo=$row[4];
				$StudentFatherName=$row[5];
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
				$_SESSION['userid']=$suser;
				$_SESSION['StudentName']=$StudentName;
				$_SESSION['StudentClass']=$StudentClass;
				$_SESSION['StudentRollNo']=$StudentRollNo;
				$_SESSION['StudentFatherName']=$StudentFatherName;				
				
				header("Location: Users/CollIndex.php");
			}
			else
			{
							$msg="Password does not match ! Please Try Again";
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

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>School-Login</title>

<style type="text/css">
.auto-style2 {
	font-family: Calibri;
	font-weight: normal;
	font-style: normal;
	text-decoration: none;
	color: #000000;
	font-size: 15px;
	text-align: center;
	margin-top: 0px;
}
.auto-style3 {
	text-align: center;
	font-family: Calibri;
	font-size: 15px;
	color: #000000;
	border-left-color: #112C53;
	border-left-width: 1px;
	border-right-color: #112C53;
	border-right-width: 1px;
}
.auto-style5 {
	border-width: 0px;
}
.auto-style10 {
	border-style: none;
	border-width: medium;
}
.auto-style12 {
	text-align: left;
}
.auto-style13 {
	font-weight: normal;
}
.auto-style14 {
	font-family: Calibri;
	font-size: 15px;
	color: #000000;
}
.auto-style15 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style16 {
	text-align: center;
}
.auto-style17 {
	font-family: Calibri;
	font-size: 15px;
	color: #000000;
	text-decoration: underline;
}
.auto-style18 {
	font-family: Calibri;
	font-size: 15px;
	color: #000000;
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.auto-style20 {
	border-style: solid;
	border-width: 1px;
}
.auto-style21 {
	font-family: Calibri;
	font-size: 15px;
	color: #000000;
	border-style: none;
	border-width: medium;
}
</style>

</head>



<body height="100%" width="100%" align="center" bgcolor="#EDEDED">


<br>
<div align="center">

	<table border="1" width="40%" style="border-width:0px; border-collapse: collapse; " bordercolor="#112C53" id="table1">

		<tr>

			<td style="border-style:none; border-width:medium; ">

			<p class="auto-style2" style="width: 664px">
			<font size="5">Aravali International School</font><br></td>

		</tr>

		<tr>

			<td style="border-bottom-style: none; border-bottom-width: medium; border-left-color:#112C53; border-left-width:1px; border-right-color:#112C53; border-right-width:1px" bgcolor="#FFFFFF">

			<p align="center">

			<img border="0" src="Users/images/aravali_logo.jpg"></td>

		</tr>

		<tr>

			<td class="auto-style3">

			Student Information System - Daily School Information Digest</td>
			
			

		</tr>
		

		<tr>

			<td style="border-left:medium none #112C53; border-right:medium none #112C53; border-bottom-style:none; border-bottom-width:medium">

			<p class="auto-style12">
			<div class="auto-style16">
				<span style="font-family: Calibri; font-size: 15px; font-style: normal; text-decoration: none; color: #000000">
				<strong><br>Daily Work Details</strong></span></div>
			<table cellpadding="0" cellspacing="0" class="auto-style5" style="width: 664px">
				<tr>
					<td class="auto-style18" style="width: 221px; text-align:left">
					<strong class="auto-style13"><strong>Subject</strong></strong></td>
					<td class="auto-style18" style="width: 221px">
					<strong class="auto-style13"><strong>Classwork</strong></strong></td>
					<td class="auto-style18" width="222"><strong>Homework</strong></td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px; height: 23px" align="left">
					</td>
					<td class="auto-style20" style="height: 23px; width: 221px">
					</td>
					<td class="auto-style20" style="height: 23px" width="222"></td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style20" style="width: 221px" align="left">&nbsp;</td>
					<td class="auto-style20" style="width: 221px">&nbsp;</td>
					<td class="auto-style20" width="222">&nbsp;</td>
				</tr>
				<tr>
					<td class="auto-style10" colspan="3">
					<span class="auto-style17"><strong>Notice Issued:</strong></span><br>
					<br><br></td>
				</tr>
				<tr>
					<td class="auto-style21" colspan="3">For further details, 
					please visit: <a href="http://www.ais43.aravalisis.com">
					www.ais43.aravalisis.com</a><br><br><br>This is an auto mailer 
					generated by system automatically. Kindly do not reply to 
					this email.</td>
				</tr>
			</table>
			</td>
			
			

		</tr>
		

		</table>

</div>

</body>



</html>
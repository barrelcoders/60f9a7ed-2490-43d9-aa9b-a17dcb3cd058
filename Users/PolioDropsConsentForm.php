<?php
session_start();
include '../connection.php';
include '../AppConf.php';
	$StudentClass = $_SESSION['StudentClass'];
	$StudentRollNo = $_SESSION['StudentRollNo'];
	
	$sadmission=$_SESSION['userid'];
	$rs=mysql_query("select `sname`,`sclass`,`srollno` from `student_master` where `sadmission`='$sadmission'");
	$row=mysql_fetch_row($rs);
	$sname=$row[0];
	$StudentClass=$row[1];
	$StudentRollNo=$row[2];
	
	if($sadmission == "")
	{
		echo "<br><br><center><b>Session Expired!<br>click <a href='http://dpsfsis.com/'>here</a> to login again!";
		exit();
	}
?>
<?php
if(isset($_POST['submit']))
{
   $Consent=$_POST['D1'];
   $rsChk=mysql_query("select * from PolioDropsConsent where `sadmission`='$sadmission'");
   if(mysql_num_rows($rsChk)>0)
   {
   		$Msg="<center><b>Already Submitted!";
   }
   else
   {
	   mysql_query("INSERT INTO PolioDropsConsent(`sadmission`, `sname`, `sclass`, `Consent`)VALUES('$sadmission','$sname','$StudentClass','$Consent')");
	   $Msg="<center><b>Submitted Successfully!";
	}
}
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Polio Drops Consent Form</title>
</head>

<body>
<font face="Cambria">
<?php
if($Msg !='')
{
	echo "<p>".$Msg."</p>";
	exit();
}
?>
</font>
<form method="POST" method ="post" action="">
<table border="1" width="100%" style="border-collapse: collapse" height="305">
	<tr>
		<td colspan="2" height="19" style="border-bottom-style: none; border-bottom-width: medium">
		<p align="center"><font face="Cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></td>
	</tr>
	<tr>
		<td colspan="2" height="19" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">
		<p align="center"><font face="Cambria"><b><?php echo $SchoolAddress; ?></b></font></td>
	</tr>
	<tr>
		<td colspan="2" height="19" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">
		<p align="center"><font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font></td>
	</tr>
	<tr>
		<td colspan="2" height="19" style="border-top-style: none; border-top-width: medium; border-bottom-style: none; border-bottom-width: medium">
		<p align="center"><font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font></td>
	</tr>
	<tr>
		<td colspan="2" height="19" style="border-top-style: none; border-top-width: medium">
		<p align="center">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" height="57">
		<p align="center"><font face="Cambria"><b>Circular For Vaccination</b></font></p>
		<p align="center"><font face="Cambria"><b>Consent Slip</b></font></td>
	</tr>
	<tr>
		<td colspan="2" height="133">&nbsp;<p><font face="Cambria"><b>Dear 
		Parent</b><br>
		<br>
		This is to inform you that Pulse Polio Drops will be administered by 
		Government Health Agencies in school for the children aged upto 5 years 
		on September 27, 2016 (Tuesday) during school hours.<br>
		<br>
		<br>
		Kindly give your consent online by Monday, September 26, 2016, on the student portal regarding the same.</font></p>
		<p><font face="Cambria"><br>
		<b>PRINCIPAL</b></font></p>
		<p>&nbsp;</td>
	</tr>
	<tr>
		<td height="21" width="516">&nbsp;</td>
		<td height="21" width="517">&nbsp;</td>
	</tr>
	<tr>
		<td height="22" width="516"><font face="Cambria"><b>I hereby give my 
		consent to give polio drops to my child</b></font></td>
		<td height="22" width="517">
		
			<p><font face="Cambria">
			<select size="1" name="D1" style="font-weight: 700">
			<option selected>Yes</option>
			<option>No</option>
			</select></font></p>
		
		</td>
	</tr>
</table>
	<p align="center">
	<font face="Cambria">
	<input name="submit" type="submit" value="Submit" style="font-weight: 700" class="text-box" ></font></p>
</form>
<p align="center">&nbsp;</p>

</body>

</html>
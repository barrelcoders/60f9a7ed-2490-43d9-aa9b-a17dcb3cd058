<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_POST["isSubmit"]=="yes")
{
	
	$txtclass=$_POST["txtClass"];
	$txtSubject=$_POST["txtSubject"];
	$txtChapter=$_POST["txtChapter"];
	$rsCheck=mysql_query("select * from `Assignment_Topic` where UCASE(`ChapterName`)=UCASE('$txtChapter')");
	if(mysql_num_rows($rsCheck)>0)
	{
		$Msg="ChapterName:".$txtChapter." already Exists!";
	}
	else
	{
		mysql_query("insert into `Assignment_Chapter` (`sclass`,`Subject`,`ChapterName`) values ('$txtclass','$txtSubject','$txtChapter')");
		$Msg="Category submitted successfully!";
	}
}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Create Chapter </title>
<style type="text/css">
.style1 {
	text-align: center;
	color: #CC3300;
}
.style2 {
	font-family: Cambria;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Define Topic</font></b></p>
<hr>
<p class="style1">

<strong><?php echo $Msg;?></strong>
</p>
<table border="1" width="100%" style="border-width:0px; border-collapse: collapse">
<form name="frmDocument" id="frmDocument" method="post" action="CreateLesson.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
		<td style="border-style: none; border-width: medium"><b>
		<font face="Cambria">Select Class</font></b></td>
		<td style="border-style: none; border-width: medium">
		
							  <select name="txtClass"  id="txtClass" class="text-box">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `class` FROM `class_master`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></td>
		<td style="border-style: none; border-width: medium">
		
			<b><font face="Cambria">Select Subject</font></b></td>
		<td style="border-style: none; border-width: medium">
		
							  <select name="txtSubject"  id="txtSubject" class="text-box">
								<option selected="" value="Select One">Select One</option>
								 <?php
									$ssqlName="SELECT distinct `Subject` FROM `subject_master`";
									$rsName= mysql_query($ssqlName);
									
									while($row1 = mysql_fetch_row($rsName))
									{
											$Name=$row1[0];
									?>
								 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
								 <?php 
									}
									?>
								</select></td>
		<td style="border-style: none; border-width: medium">
		
			<b><font face="Cambria">Enter Chapter</font></b></td>
		<td style="border-style: none; border-width: medium">
		
			<input name="txtChapter" id="txtChapter" type="text" class="text-box" required="true" ></td>
	</tr>
	<tr>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium" colspan="5">
		
			&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" style="border-style: none; border-width: medium">
		<p align="center">
		<input type="submit" value="Submit" name="B1" style="font-weight: 700" class="text-box" ></td>
	</tr>
	</form>
</table>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">
	<tr>
		<td align="center" style="text-align: center" ><font face="Cambria"><b>Sr No</b></font></td>
		<td align="center" style="text-align: center" ><b><font face="Cambria">
		Class</font></b></td>
		<td align="center" style="text-align: center" ><b><font face="Cambria">
		Subject</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">
		Chapter Name</font></b></td>
		

		
	</tr>
	<?php
	$recno=1;
	$rs=mysql_query("select `sclass`,`Subject`,`ChapterName` from `Assignment_Chapter`");

	while($row=mysql_fetch_row($rs))
	{
		$CLass=$row[0];
	    $Subject=$row[1];

		
		$Topic=$row[2];
	?>
	<tr>
		<td align="center" class="style2" width="90"><?php echo $recno;?>.</td>
		<td align="center" class="style2" width="172"><?php echo $CLass;?></td>
		
		<td align="center" class="style2" width="321"><?php echo $Subject;?></td>
	  <td align="center" class="style2"><?php echo $Topic;?></td>

	</tr>
	<?php
	$recno=$recno+1;
	}
	?>	
	
</table>

<p>&nbsp;</p>

</body>

</html>
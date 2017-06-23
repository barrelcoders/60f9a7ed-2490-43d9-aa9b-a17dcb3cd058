<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_POST["isSubmit"]=="yes")
{
	$txtClass=$_POST["txtClass"];
	$txtParameter=$_POST["txtParameter"];
	$txtDescription=$_POST["txtDescription"];
	$txtURL=$_POST["txtURL"];
	
	$rsCheck=mysql_query("select * from `StudentInfoCollectionMaster` where UCASE(`URL`)=UCASE('$txtURL')");
	if(mysql_num_rows($rsCheck)>0)
	{
		$Msg="URL:".$txtURL." already Exists!";
	}
	else
	{
			$rs=mysql_query("INSERT INTO `StudentInfoCollectionMaster`(`sclass`, `parameter`, `description`, `URL`, `Status`) VALUES ('$txtClass','$txtParameter','$txtDescription','$txtURL','Active')");
		
		$Msg="Information submitted successfully!";
	}
}
?>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Create Topic </title>


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

<p><b><font face="Cambria">Create Information Collection Link</font></b></p>

<hr>

<p class="style1">



<strong><?php echo $Msg;?></strong>

</p>
<form name="frmDocument" id="frmDocument" method="post" action="CreateInfoCollection.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<table border="1" width="100%" style="border-width:0px; border-collapse: collapse">



	<tr>

		<td style="border-style: none; border-width: medium"><b>

		<font face="Cambria">Select Class</font></b></td>

		<td style="border-style: none; border-width: medium" colspan="2">

		

							  <select name="txtClass"  id="txtClass" class="text-box" >

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

		

			<b><font face="Cambria">Parameter</font></b></td>

		<td style="border-style: none; border-width: medium">

		

							  <input name="txtParameter" id="txtParameter" type="text" class="text-box"  required="true"></td>

		<td style="border-style: none; border-width: medium" colspan="2">

		

			<b><font face="Cambria">Description</font></b></td>

		<td style="border-style: none; border-width: medium">

	
<textarea rows="2" name="txtDescription" id="txtDescription" type="text" class="text-box"  required="true" cols="20"></textarea></td>

	</tr>

	<tr>

		<td style="border-style: none; border-width: medium">&nbsp;</td>

		<td style="border-style: none; border-width: medium" colspan="7">

		

			&nbsp;</td>

	</tr>

	<tr>

		<td colspan="2" style="border-style: none; border-width: medium"><b>
		<font face="Cambria">URL</font></b></td>

		<td colspan="2" style="border-style: none; border-width: medium">

		

			<input name="txtURL" id="txtURL" type="text" class="text-box"  required="true"></td>

		<td colspan="2" style="border-style: none; border-width: medium">&nbsp;</td>

		<td colspan="2" style="border-style: none; border-width: medium">

		

			&nbsp;</td>

	</tr>

	<tr>

		<td colspan="8" style="border-style: none; border-width: medium">

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
		Parameter</font></b></td>

		<td align="center" style="text-align: center" ><b><font face="Cambria">Description</font></b></td>



		<td align="center" style="text-align: center"><b><font face="Cambria">
		URL</font></b></td>

		



		

	</tr>

	<?php

	$recno=1;

	$rs=mysql_query("SELECT `sclass`, `parameter`, `description`, `URL`, `Status` FROM `StudentInfoCollectionMaster`");



	while($row=mysql_fetch_row($rs))

	{

		$CLass=$row[0];

	    $Parameter=$row[1];

          $Description=$row[2];

          $URL=$row[3];

	?>

	<tr>

		<td align="center" class="style2" width="90"><?php echo $recno;?>.</td>

		<td align="center" class="style2" width="172"><?php echo $CLass;?></td>

			<td align="center" class="style2" width="321"><?php echo $Parameter;?></td>



		<td align="center" class="style2" width="321"><?php echo $Description;?></td>

	  <td align="center" class="style2"><?php echo $URL;?></td>



	</tr>

	<?php

	$recno=$recno+1;

	}

	?>	

	

</table>



<p>&nbsp;</p>



</body>



</html>
<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
  $ssql="SELECT distinct `EmpId`,`Name`,`Department`,`Designation`,`L1_Approver_Id` FROM `employee_master` where `Department`!='TRANSPORT' and `Department`!='ADMINISTRATIVE STAFF' and `Department`!='CLASS IV' ORDER BY `EmpId`";
	$rs= mysql_query($ssql);
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<title>Teacher Class Teacher Mapping</title>
</head>

<body>

<p>&nbsp;</p>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" class="CSSTableGenerator">
<form name="frmMappping" id="frmMapping" method="POST" action="ClassTeacherAndClassMapping.php">
	<tr>
		<td align="center" width="170"><b><font face="Cambria">Srno</font></b></td>

		<td align="center" width="170"><b><font face="Cambria">Emp ID</font></b></td>
		<td align="center" width="170"><b><font face="Cambria">Emp Name</font></b></td>
		<td align="center" width="170"><b><font face="Cambria">Department</font></b></td>
		<td align="center" width="177"><b><font face="Cambria">Designation</font></b></td>
		<td align="center" width="148"><b><font face="Cambria">Class Teacher</font></b></td>
		<td align="center" width="178"><b><font face="Cambria">Submit</font></b></td>
	</tr>
	<?php
				$cnt=1;
				while($row = mysql_fetch_row($rs))
				{
							$EmployeeId=$row[0];
							$EmployeeName=$row[1];
							$Department=$row[2];
							$Designation=$row[3];
							
				?>

	<tr>
	     <td class="style4" style="width: 206px"><?php echo $cnt;?></td>
        <td class="style4" style="width: 206px"><?php echo $EmployeeId;?></td>
		<td class="style2" style="width: 206px"><?php echo $EmployeeName;?></td>
		<td class="style2" style="width: 206px"><?php echo $Department;?></td>
		<td class="style2" style="width: 207px"><?php echo $Designation;?></td>
		<td class="style2" style="width: 207px">		
		<select name="txtClass" id="txtClass" style="float: left" ; class="text-box" >
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

            	<td class="style2" style="width: 207px"><input type="submit" name="submit" value="Submit" </td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}
	?>
	</form>
</table>
</body>

</html>
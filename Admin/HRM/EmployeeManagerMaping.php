<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
  $ssql="SELECT distinct `EmpId`,`Name`,`Department`,`Designation`,`L1_Approver_Id` FROM `employee_master` ORDER BY `EmpId`";
	$rs= mysql_query($ssql);
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script language="javascript">

function sname()
{
	document.getElementById("trWait").style.display="";
	document.getElementById("trWait").innerHTML ="Please Wait...";
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);
			        	arr_row=rows.split(",");
			        	document.getElementById('txtEmpName').value=arr_row[0];
						document.getElementById('txtEmpType').value=arr_row[1];       	 
						document.getElementById('txtMobile').value=arr_row[2];       	 
						document.getElementById("trWait").style.display="none";
						document.getElementById("trWait").innerHTML ="";						
			        }
		      }
			
			var submiturl="get_info3.php?c=" + document.getElementById('txtEmpNo').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>

<title>Employee Manager Maping</title>
</head>

<body>

<p>&nbsp;</p>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" class="CSSTableGenerator">
<form name="frmMappping" id="frmMapping" method="POST" action="EmployeeManagerMaping.php">
	<tr>
		<td align="center" width="170"><b><font face="Cambria">Srno</font></b></td>

		<td align="center" width="170"><b><font face="Cambria">Emp ID</font></b></td>
		<td align="center" width="170"><b><font face="Cambria">Emp Name</font></b></td>
		<td align="center" width="170"><b><font face="Cambria">Department</font></b></td>
		<td align="center" width="177"><b><font face="Cambria">Designation</font></b></td>
		<td align="center" width="148"><b><font face="Cambria">Current Manager 
		Emp Id</font></b></td>
		<td align="center" width="51"><b><font face="Cambria">Current Manager</font></b></td>
		<td align="center" width="88"><b><font face="Cambria">Change Manager</font></b><p>&nbsp;</td>
		<td align="center" width="177"><b><font face="Cambria">Changed Manager 
		Name</font></b></td>
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
							$ApproverId=$row[4];
							$ssqlName="SELECT `Name` FROM `employee_master` where `EmpId`='$ApproverId'";
							$rsChk= mysql_query($ssqlName);
		 					while($row1 = mysql_fetch_row($rsChk))
                            {
				               $ManagerName=$row1[0];
				               break;
				             }							
				?>

	<tr>
	     <td class="style4" style="width: 206px"><?php echo $cnt;?></td>
        <td class="style4" style="width: 206px"><?php echo $EmployeeId;?></td>
		<td class="style2" style="width: 206px"><?php echo $EmployeeName;?></td>
		<td class="style2" style="width: 206px"><?php echo $Department;?></td>
		<td class="style2" style="width: 207px"><?php echo $Designation;?></td>
		<td class="style2" style="width: 207px"><?php echo $ApproverId;?></td>
		
		<td class="style2" style="width: 207px"><?php echo $ManagerName;?></td>

		<td class="style4" style="width: 207px">		
		<select name="txtEmpNo" id="txtEmpNo" style="float: left" ; class="text-box" onkeyup="javascript:sname();" >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `EmpId` FROM `employee_master`";
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
			 <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="<?php echo $name;?>" class="text-box"></font></td>
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
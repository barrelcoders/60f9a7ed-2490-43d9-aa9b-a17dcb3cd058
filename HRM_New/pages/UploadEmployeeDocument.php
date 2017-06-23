<?php
session_start();
include '../../connection.php';


$EmployeeId=$_REQUEST['txtEmpNo'];

$rsEmpDetail=mysql_query("SELECT `Name`,`Department`,`Designation`  from `employee_master` where `EmpId`='$EmployeeId'");
$rowEmpDetail=mysql_fetch_row($rsEmpDetail);
{
    $EmpName=$rowEmpDetail[0];
    $Department=$rowEmpDetail[1];
    $Designation=$rowEmpDetail[2];

}



?>

<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Upload Documents</title>

<link rel="stylesheet" type="text/css" href="tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="tcal.js">



</script>

<script language="javascript" type="text/javascript">


function Validate()
{

		document.getElementById("frmRpt").submit();

}

	
	




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
			
			var submiturl="get_info2.php?c=" + document.getElementById('txtEmpNo').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>



</script>
<style>
<!--
.style4 {
	font-family: Cambria;
}
-->
</style>
</head>
<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Upload Documents</font></b></p>
<hr>
<p>&nbsp;</p>
<font face="Cambria">
</font>
<table border="1" width="100%" style="border-collapse: collapse">
<form name ="frmRpt" id="frmRpt" method ="post" action="SubmitEmployeeDocument.php" enctype="multipart/form-data">


	 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 		<tr>

<b>

		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146"><font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo"  style="float: left" value="<?php echo $EmployeeId; ?>" class="text-box" readonly/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<b><span class="style4"></span><font face="Cambria">Emp Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="<?php echo $EmpName; ?>" class="text-box" readonly/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value=" <?php echo $Department; ?>" class="text-box" readonly/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="<?php echo $Designation; ?>" class="text-box" readonly/></font></td>
		  
		
 		</tr>

	<tr>
		<td align="center"><b><font face="Cambria">Sr No</font></b></td>
		<td align="left"><b><font face="Cambria">Document to be uploaded</font></b></td>
		<td align="center" colspan="6">
		<p align="left"><b><font face="Cambria">Choose file</font></b></td>
	</tr>
	<tr>
		<td align="center"><b><font face="Cambria">1</font></b></td>
		<td align="left">
		<b><font face="Cambria">Profile Photo</font></b></td>
		<td  colspan="6">
		<font face="Cambria"> <input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td align="left">
		&nbsp;</td>
		<td  colspan="6">
		&nbsp;</td>
		</tr>
	<tr>
		<td colspan="8" align="center">
		

		<font face="Cambria">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700" class="text-box"></font></td>
	</tr>
	</form>
</table>

<p>&nbsp;</p>

</body>

</html>
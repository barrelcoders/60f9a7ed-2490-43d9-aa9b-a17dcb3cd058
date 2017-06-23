<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
$EmployeeId=$_SESSION['userid'];


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

<script language="javascript">


function Validate()
{
if(document.frmDocumentUpload.F1.value=="")
	{
		alert("Aadhar Certificate Photo is mandatory!");
		return;
	}
		document.getElementById("frmDocumentUpload").submit();

}
</script>
</head>

<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">Upload Documents</font></b></p>
<hr>
<p>&nbsp;</p>
<font face="Cambria">
</font>
<table border="1" width="100%" style="border-collapse: collapse">
<form name ="frmDocumentUpload" id="frmDocumentUpload" method ="post" action="UploadEmployeeDocument.php" enctype="multipart/form-data">

	 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146"><font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" style="float: left" value="<?php echo $EmployeeId; ?>" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><span class="style4">Emp</span><font face="Cambria"> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left" value="<?php echo $EmpName;?>" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left" value="<?php echo $Department;?>" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left" value="<?php echo $Designation;?>" class="text-box"></font></td>
		  
		
 </tr>

	<tr>
		<td align="center"><b><font face="Cambria">Sr No</font></b></td>
		<td align="left"><b><font face="Cambria">Document to be uploaded</font></b></td>
		<td align="center" colspan="7">
		<p align="left"><b><font face="Cambria">Choose file</font></b></td>
	</tr>
	<tr>
		<td align="center"><b><font face="Cambria">1</font></b></td>
		<td align="left">
		<b><font face="Cambria">Aadhar Card</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> <input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">2</font></b></td>
		<td align="left">
		<b><font face="Cambria">Voter Id Card</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F2" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">3</font></b></td>
		<td>
		<b><font face="Cambria">Ration&nbsp; Card</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F3" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">4</font></b></td>
		<td>
		<b><font face="Cambria">Driving License </font></b> </td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F4" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">5</font></b></td>
		<td>
		<b><font face="Cambria">Pan Card</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F5" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">6</font></b></td>
		<td>
		<b><font face="Cambria">Class 10th Certificate</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F6" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">7</font></b></td>
		<td>
		<b><font face="Cambria">Class 12th Certificate</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F7" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">8</font></b></td>
		<td>
		<b><font face="Cambria">Graduation Degree</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F8" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td align="center"><b><font face="Cambria">9</font></b></td>
		<td>
		<b><font face="Cambria">Post Graduation Degree (if any)</font></b></td>
		<td  colspan="7">
		<font face="Cambria"> 
		<input type="file" name="F9" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif"></font></td>
		</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="left">
		&nbsp;</td>
		<td  colspan="7">
		&nbsp;</td>
		</tr>
	<tr>
		<td colspan="10" align="center">
		

		<font face="Cambria">
		<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700" class="text-box"></font></td>
	</tr>
	</form>
</table>

<p>&nbsp;</p>

</body>

</html>
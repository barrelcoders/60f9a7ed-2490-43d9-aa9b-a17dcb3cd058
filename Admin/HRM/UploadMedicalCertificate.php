<?php 
session_start();
include '../../connection.php';
?>
<?php
	$srno=$_REQUEST["recno"];
	$EmpId=$_REQUEST["EmpID"];
	
		if($_REQUEST["isSubmit"]=="yes")
		{
			  $srno=$_REQUEST["srno"];
			  $EmpID=$_REQUEST["EmpId"];
			  $LeaveType=$_REQUEST["LeaveType"];
			    $LeaveDate=$_REQUEST["LeaveDate"];

			  $t=time();				
			  $extension = end(explode(".", $_FILES["F1"]["name"]));
			  
			  $MedicalCertiFileName="";
			  if($_FILES["F1"]["name"] !="")
			  {
			      $MedicalCertiFileName="MedicalCerti".$t.$_FILES["F1"]["name"];			      
			  }
		      move_uploaded_file($_FILES["F1"]["tmp_name"],"MedicalCertificates/MedicalCerti".$t.$_FILES["F1"]["name"]);
		      		     
            //echo"update `Employee_Leave_Transaction` set `MedicalCertificate`='$MedicalCertiFileName' where `EmployeeId`='$EmpID' and `LeaveType`='$LeaveType' and `EntryDate`='$LeaveDate'";
		      mysql_query("update `Employee_Leave_Transaction` set `MedicalCertificate`='$MedicalCertiFileName' where `EmployeeId`='$EmpID' and `LeaveType`='$LeaveType' and `EntryDate`='$LeaveDate'");
		      echo "<br><br><center><b>Certificate Uploaded Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
		 }
		      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select File</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	text-align: right;
	font-family: Cambria;
}
.style3 {
	text-align: center;
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
<form name="frmUpload" id="frmUpload" method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<input type="hidden" name="srno" id="srno" value="<?php echo $srno;?>">
<input type="hidden" name="EmpId" id="EmpId" value="<?php echo $EmpId;?>">
	<tr>
		<td class="style2" style="width: 601px">Select File :</td>
		<td style="width: 602px">
			<input type="file" name="F1" size="20" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif">
		</td>
	</tr>
	<tr>
		<td colspan="2" class="style3">
		<input name="Submit1" type="submit" value="Submit"></td>
	</tr>
</form>
</table>

</body>

</html>

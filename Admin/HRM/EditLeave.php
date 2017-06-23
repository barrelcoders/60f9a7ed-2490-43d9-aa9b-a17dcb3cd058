<?php
session_start();
include '../../connection.php';
?>
<?php
$SrNo=$_REQUEST["srno"];



if ($SrNo !="")
{
	$ssql="SELECT `srno`, `EmployeeId`, `EmployeeName`, `LeaveFrom`, `LeaveTo`, `LeaveType`, `NoOfDays`, `ContactNoDuringLeave`, `AddressDuringLeave`, `Remarks`, `EntryDate`, `ApproverId`, `ApprovalStatus`, `L2ApproverId`, `L2ApproverStatus`, `L1Remarks`, `L2Remarks`, `L3ApproverId`, `L3ApproverStatus`, `L3Remarks`, `MedicalCertificate`, `StatusUpdateDate` FROM `Employee_Leave_Transaction` WHERE  `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$EmployeeId=$row[1];
					$EmployeeName=$row[2];
					$LeaveFrom=$row[3];
					$LeaveTo=$row[4];
				
					$arr=explode('-',$DOB);
					$DOB=  $arr[1]. "/" . $arr[2] . "/" . $arr[0];
	
					$LeaveType=$row[5];
					$NoOfDays=$row[6];
					$ContactNoDuringLeave=$row[7];
					$AddressDuringLeave=$row[8];
					$Remarks=$row[9];
					$EntryDate=$row[10];
					
	}
}
	$ssql= "SELECT distinct `LeaveType` FROM `LeaveTypeMaster`";
   $result = mysql_query($ssql, $Con);
  
if ($_REQUEST["txtName"] !="")
{
	                $srno=$_REQUEST["SrNo"];
					$EmployeeId=$_REQUEST["txtEmpId"];
					$EmployeeName=$_REQUEST["txtName"];
					$LeaveFrom=$_REQUEST["txtFrom"];
				
					//$arr=explode('/',$LeaveFrom);
	                  //$LeaveFrom= $arr[2] . "-" . $arr[0] . "-" . $arr[1];
					
					$LeaveTo=$_REQUEST["txtTo"];

					//$arr1=explode('/',$LeaveTo);
	                //$LeaveTo= $arr1[2] . "-" . $arr1[0] . "-" . $arr1[1];

	
					$LeaveType=$_REQUEST["cboClass"];
					$NoOfDays=$_REQUEST["txtDays"];
					$ContactNoDuringLeave=$_REQUEST["txtMobile"];
					$AddressDuringLeave=$_REQUEST["txtAddress"];
					$Remarks=$_REQUEST["txtRemarks"];
					

	
	
	

	
			$ssql="UPDATE `Employee_Leave_Transaction` SET `EmployeeId`='$EmployeeId', `EmployeeName`='$EmployeeName', `LeaveFrom`='$LeaveFrom', `LeaveTo`='$LeaveTo', `LeaveType`='$LeaveType', `NoOfDays`='$NoOfDays', `ContactNoDuringLeave`='$ContactNoDuringLeave', `AddressDuringLeave`='$AddressDuringLeave', `Remarks`='$Remarks' where `srno` = '$srno'";
           //echo "UPDATE `Employee_Leave_Transaction` SET `EmployeeId`='$EmployeeId', `EmployeeName`='$EmployeeName', `LeaveFrom`='$LeaveFrom', `LeaveTo`='$LeaveTo', `LeaveType`='$LeaveType', `NoOfDays`='$NoOfDays', `ContactNoDuringLeave`='$ContactNoDuringLeave', `AddressDuringLeave`='$AddressDuringLeave', `Remarks`='$Remarks' where `srno` = '$srno'";
			//exit();
			
			mysql_query($ssql) or die(mysql_error());
			
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtName").value=="")

	{

		alert("Name is mandatory");

		return;

	}

	if (document.getElementById("txtEmpId").value=="")

	{

		alert("Employee ID is mandatory");

		return;

	}

	if (document.getElementById("txtFrom").value=="")

	{

		alert("Leave From is mandatory");

		return;

	}

	if (document.getElementById("txtTo").value=="")

	{

		alert("To date is Mandatory is mandatory");

		return;

	}

	if (document.getElementById("txtMobile").value=="")

	{

		alert("Mobile No is mandatory");

		return;

	}

	document.getElementById("frmEditLeave").submit();

	

}

function FillClass()

{

	document.getElementById("txtLeaveType").value=document.getElementById("cboClass").value;

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Student Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>



<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

.style2 {

	text-align: center;

}

.style3 {

	color: #000000;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #FFFFFF;

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

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}

.style4 {

	text-align: left;

	font-family: Cambria;

	font-size: 12pt;

	color: #000000;

	background-color: #FFFFFF;

}

.style5 {

	text-align: left;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditLeave" id="frmEditLeave" method="post" action="EditLeave.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>EmpId:</strong></td>

		<td style="width: 524px">

		<input name="txtEmpId" id="txtEmpId" type="text" value="<?php echo $EmployeeId; ?>" size="40"></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Name:</strong></td>

		<td style="width: 524px">

		<input name="txtName" id="txtName" type="text" value="<?php echo $EmployeeName; ?>" size="53"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Leave From:</strong></td>

		<td style="width: 524px">

		<input name="txtFrom" id="txtFrom" type="Date" value="<?php echo $LeaveFrom; ?>" size="43"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Leave To</strong></td>

		<td style="width: 524px">

		<input name="txtTo" id="txtTo"  type="Date" value="<?php echo $LeaveTo; ?>" size="43"></td>

	

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Leave Type:</strong></td>

		<td style="width: 524px">

		<input name="txtLeaveTpye" id="txtLeaveTpye" type="text" value="<?php echo $LeaveType; ?>" readonly="readonly" size="43">

		<select name="cboClass" id="cboClass" style="height: 22px" onchange="Javascript:FillClass();">

		

		<?php

				while($row = mysql_fetch_assoc($result))

   				{

   					$class=$row['LeaveType'];

			?>

			<option value="<?php echo $class; ?>" <?php if ($class==$LeaveType) { ?> selected="selected" <?php } ?>><?php echo $class; ?></option>

			<?php

				}

			?>

		</select></td>

	</tr>

	<tr>

		<td class="style4">

		<strong>No Of days:</strong></td>

		<td class="style5">

		<input name="txtDays" id="txtDays" type="text" value="<?php echo $NoOfDays; ?>" size="43"></td>

	</tr>

<tr>

		<td class="style4">

		<strong>Contact Number:</strong></td>

		<td class="style5">



		<input name="txtMobile" id="txtMobile" type="text" value="<?php echo $ContactNoDuringLeave; ?>" size="43"></td>

	</tr>

	

<tr>

		<td class="style4">

		<strong>Address:</strong></td>

		<td class="style5">



		<input name="txtAddress" id="txtAddress" type="text" value="<?php echo $AddressDuringLeave; ?>"size="43"></td>

	</tr>

	

	<tr>

		<td style="width: 523px" class="style3"><strong>Remarks</strong></td>

		<td style="width: 524px">

		<input name="txtRemarks" id="txtRemarks" type="text" value="<?php echo $Remarks; ?>" size="43"></td>

	</tr>

	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>



</html>
<?php 
error_reporting(0);
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$CurrentMonth= date('M');
$CurrentMontColumnName='M'.$CurrentMonth;
$EmployeeId=$_SESSION['userid'];
$rsLeaveType=mysql_query("select distinct `LeaveType` from `LeaveTypeMaster`");

$rs=mysql_query("select `srno`,`EmployeeId`,`EmployeeName`,DATE_FORMAT(`LeaveFrom`,'%d-%m-%Y')  as `LeaveFrom`,DATE_FORMAT(`LeaveTo`,'%d-%m-%Y')  as `LeaveTo`,`LeaveType`,`NoOfDays`,`ContactNoDuringLeave`,`AddressDuringLeave`,`Remarks`,DATE_FORMAT(`EntryDate`,'%d-%m-%Y')  as `EntryDate`,`ApproverId` from `Employee_Leave_Transaction` where `ApproverId`='$EmployeeId' and `ApprovalStatus`='Pending'");
$rs1=mysql_query("select `srno`,`EmployeeId`,`EmployeeName`,`LeaveFrom`,`LeaveTo`,`LeaveType`,`NoOfDays`,`ContactNoDuringLeave`,`AddressDuringLeave`,`Remarks`,`EntryDate`,`ApproverId` from `Employee_Leave_Transaction` where `L2ApproverId`='$EmployeeId' and `ApprovalStatus`='Approved' and `L2ApproverStatus`='Pending'");
?>
<script language="javascript">
function fnlApp(srno,TblSrNo,ApproverLevel)
{
	document.getElementById ("btnApprove"+srno).disabled=true;
	document.getElementById ("btnReject"+srno).disabled=true;
	Remarks=document.getElementById("txtRemarks"+srno).value;
	var myWindow = window.open("LeaveApproveRej.php?srno=" + TblSrNo +"&ApproverLevel="+ ApproverLevel + "&Remarks=" + escape(Remarks) + "&action=Approve", "", "width=350, height=200");	
	return;
}
function fnlRej(srno,TblSrNo,ApproverLevel)
{
	document.getElementById ("btnApprove"+srno).disabled=true;
	document.getElementById ("btnReject"+srno).disabled=true;
	Remarks=document.getElementById("txtRemarks"+srno).value;
	var myWindow = window.open("LeaveApproveRej.php?srno=" + TblSrNo +"&ApproverLevel="+ ApproverLevel + "&Remarks=" + escape(Remarks) + "&action=Reject", "", "width=350, height=200");	
	
	return;
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>SrNo</title>
<style type="text/css">
.style1 {
	font-family: Cambria;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><b>Approve / Reject Leaves</b></font></p>
<hr>
<p>&nbsp;</p>
<div id="MasterDiv">
<table cellpadding="0" style="width: 100%; border-collapse:collapse" class="CSSTableGenerator">
	<tr>
		<td bgcolor="#48AC2E" height="19" style="border-style: solid; border-width: 1px; width: 82px;" align="center" >
		<font face="Cambria" color="#FFFFFF">SrNo</font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 82px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Emp. Id</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Emp. Name</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Leave From</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Leave To</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Leave Type</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Days</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Contact No</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Address</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Remarks</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Submit Date</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Approver Id</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Approver Level</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Remarks </strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 83px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Approve</strong></font></td>
		<td bgcolor="#48AC2E" align="center" style="border-style: solid; border-width: 1px; width: 173px;">
		<b>
		<font face="Cambria" color="#FFFFFF">
		Reject</font></b></td>
	</tr>
	<?php
		
				$srno=0;
				while($row=mysql_fetch_row($rs))
				{
					$TblSrNo=$row[0];
					$EmployeeId=$row[1];
					$EmployeeName=$row[2];
					$LeaveFrom=$row[3];
					$LeaveTo=$row[4];
					$LeaveType=$row[5];
					$NoOfDays=$row[6];
					$ContactNoDuringLeave=$row[7];
					$AddressDuringLeave=$row[8];
					$Remarks=$row[9];
					$EntryDate=$row[10];
					$ApproverId=$row[11];
					$srno=$srno+1;
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 82px;" ><font face="Cambria"><?PHP ECHO $srno; ?>.</font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 82px;"><font face="Cambria"><?php echo $EmployeeId ;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $EmployeeName;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveFrom;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveTo;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveType;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $NoOfDays;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $ContactNoDuringLeave;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $AddressDuringLeave;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $Remarks;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $EntryDate;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $ApproverId;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;" class="style1">
		L1</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;" class="style1">		
				<textarea name="txtRemarks<?php echo $srno;?>" id="txtRemarks<?php echo $srno;?>" cols="20" rows="2"></textarea>
		</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;">
			<input name="btnApprove<?php echo $srno;?>" id="btnApprove<?php echo $srno;?>" type="button" class="text-box" value="Approve" onclick="javascript:fnlApp('<?php echo $srno;?>','<?php echo $TblSrNo;?>','L1');">
		</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 173px;">
		<input name="btnReject<?php echo $srno;?>" id="btnReject<?php echo $srno;?>" type="button" class="text-box" value="Reject" onclick="javascript:fnlRej('<?php echo $srno;?>','<?php echo $TblSrNo;?>','L1');">
		</td>
	</tr>
	<?php
			}
		
	?>

<?php
				while($row=mysql_fetch_row($rs1))
				{
					$TblSrNo=$row[0];
					$EmployeeId=$row[1];
					$EmployeeName=$row[2];
					$LeaveFrom=$row[3];
					$LeaveTo=$row[4];
					$LeaveType=$row[5];
					$NoOfDays=$row[6];
					$ContactNoDuringLeave=$row[7];
					$AddressDuringLeave=$row[8];
					$Remarks=$row[9];
					$EntryDate=$row[10];
					$ApproverId=$row[11];
					$srno=$srno+1;
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 82px;" ><font face="Cambria"><?PHP ECHO $srno; ?>.</font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 82px;"><font face="Cambria"><?php echo $EmployeeId ;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $EmployeeName;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveFrom;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveTo;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $LeaveType;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $NoOfDays;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $ContactNoDuringLeave;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $AddressDuringLeave;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $Remarks;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $EntryDate;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;"><font face="Cambria"><?php echo $ApproverId;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;" class="style1">
		L2</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;" class="style1">
		<textarea name="txtRemarks<?php echo $srno;?>" id="txtRemarks<?php echo $srno;?>" cols="20" rows="2"></textarea>
		</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 83px;">
			<input name="btnApprove<?php echo $srno;?>" id="btnApprove<?php echo $srno;?>" type="button" class="text-box" value="Approve" onclick="javascript:fnlApp('<?php echo $srno;?>','<?php echo $TblSrNo;?>','L2');">
		</td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 173px;">
		<!--<font face="Cambria"><a href="javascript:fnlRej('<?php echo $srno;?>');">Reject</a></font>-->
		<input name="btnReject<?php echo $srno;?>" id="btnReject<?php echo $srno;?>" type="button" class="text-box" value="Reject" onclick="javascript:fnlRej('<?php echo $srno;?>','<?php echo $TblSrNo;?>','L2');">
		</td>
	</tr>
	<?php
			}
		
	?>

	</table>
	</div>
	<br>
	<br>
	<br>
	
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>


</body>

</html>
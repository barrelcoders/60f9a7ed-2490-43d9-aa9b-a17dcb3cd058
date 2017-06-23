<?php
session_start();
include '../../connection.php';
?>
<?php
   $SrNo=$_REQUEST["srno"];
   	
   	$ssql="SELECT `srno`, `EmployeeId`, `EmployeeName`, `LeaveFrom`, `LeaveTo`, `LeaveType`, `NoOfDays`, `ContactNoDuringLeave`, `AddressDuringLeave`, `Remarks`, `EntryDate`, `ApproverId`, `ApprovalStatus`, `L2ApproverId`, `L2ApproverStatus`, `L1Remarks`, `L2Remarks`, `L3ApproverId`, `L3ApproverStatus`, `L3Remarks`, `MedicalCertificate`, `StatusUpdateDate` FROM `Employee_Leave_Transaction` WHERE  `srno`='$SrNo'";
  
	$rsHome= mysql_query($ssql1);

  
   {
   		$ssql1="DELETE FROM `Employee_Leave_Transaction`  WHERE `srno`='$SrNo'";
   		
   } 
   
     //echo $ssql1;
     //echo $ssql2;
     //exit();

       
	mysql_query($ssql1) or die(mysql_error());
	
	echo "<br><br><center><b>Leave has  has been deleted!<br>Click <a href='Javascript:window.close();'>here</a> to close window";
	exit();
?>
<html>
<head></head>
<body onunload="window.opener.location.reload();">
</body>
</html>

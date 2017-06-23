<?php 
session_start();
include '../../connection.php';
?>
<?php
$SRNO=$_REQUEST["srno"];
$Action=$_REQUEST["action"];
$ApproverLevel=$_REQUEST["ApproverLevel"];
$Remarks=$_REQUEST["Remarks"];

$rsChk=mysql_query("select `ApproverId`,`L2ApproverId` from `Employee_Leave_Transaction` where `srno`='$SRNO'");
$rowC=mysql_fetch_row($rsChk);
$ApproverId=$rowC[0];
$L2ApproverId=$rowC[1];

if($Action=="Approve")
{
		$rsDetail=mysql_query("select `EmployeeId`,`EmployeeName`,(select `MobileNo` from `employee_master` where `EmpId`=a.`EmployeeId`) as `mobileno`,date_format(`LeaveFrom`,'%d-%m-%Y') as `LeaveFrom`,date_format(`LeaveTo`,'%d-%m-%Y') as `LeaveTo` from `Employee_Leave_Transaction` as `a` where `srno`='$SRNO'");
		while($rowD=mysql_fetch_row($rsDetail))
		{
			$EmployeeName=$rowD[1];
			$mobileno=$rowD[2];
			$FromDate=$rowD[3];
			$ToDate=$rowD[4];
			break;
		}		
		
		$message="Dear ".$EmployeeName." Your leave request from  ".$FromDate." to ". $ToDate. " has been approved.";
		$message=str_replace(" ","%20",$message);
		//$mobileno="9599194330";
			//$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $mobileno. "&sms=" .$message. "&senderid=SCHOOL";
			
			//$url="http://messagebhejo.com/submitsms.jsp?user=Eduworld&key=ea0e1f127cXX&mobile=".$mobileno."&message=".$message."&senderid=INFOSM&accusage=1";

						//echo $url;
						//exit();
						 // create a new cURL resource
						$ch = curl_init();
						// set URL and other appropriate options
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						// grab URL and pass it to the browser
						if($ApproverLevel=="L2" || $ApproverId==$L2ApproverId)
						curl_exec($ch);
						
						// close cURL resource, and free up system resources
						if(curl_errno($ch))
						{ 
							//echo 'Curl error: ' . curl_error($ch); 
						}
						curl_close($ch);
						

	if($ApproverLevel=="L1")
	{
		if($ApproverId==$L2ApproverId)
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Approved',`L2ApproverStatus`='Approved',`L1Remarks`='$Remarks',`L2Remarks`='$Remarks' where `srno`='$SRNO'";
		else
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Approved',`L1Remarks`='$Remarks' where `srno`='$SRNO'";
		
		mysql_query($ssql) or die(mysql_error());
	}
	else
	{
		if($ApproverId==$L2ApproverId)
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Approved',`L1Remarks`='$Remarks',`L2ApproverStatus`='Approved',`L2Remarks`='$Remarks' where `srno`='$SRNO'";
		else
		$ssql="update `Employee_Leave_Transaction` set `L2ApproverStatus`='Approved',`L2Remarks`='$Remarks' where `srno`='$SRNO'";
		
		mysql_query($ssql) or die(mysql_error());
	}
	echo "<br><br><center><b>Request Approved Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}
if($Action=="Reject")
{
	$rsDetail=mysql_query("select `EmployeeId`,`EmployeeName`,(select `MobileNo` from `employee_master` where `EmpId`=a.`EmployeeId`) as `mobileno` from `Employee_Leave_Transaction` as `a` where `srno`='$SRNO'");
		while($rowD=mysql_fetch_row())
		{
			$mobileno=$rowD[0];
			break;
		}		
		
		$message="Dear ".$EmployeeName." Your leave request from  ".$FromDate." to ". $ToDate. " has been rejected.";
		$message=str_replace(" ","%20",$message);
		//$mobileno="9818243377";
			//$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $mobileno. "&sms=" .$message. "&senderid=SCHOOL";
						//echo $url;
						//exit();
						 // create a new cURL resource
						$ch = curl_init();
						// set URL and other appropriate options
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						// grab URL and pass it to the browser
						if($ApproverLevel=="L2" || $ApproverId==$L2ApproverId)
						curl_exec($ch);
						// close cURL resource, and free up system resources
						if(curl_errno($ch))
						{ 
							//echo 'Curl error: ' . curl_error($ch); 
						}
						curl_close($ch);
						
	if($ApproverLevel=="L1")
	{
		if($ApproverId==$L2ApproverId)
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Rejected',`L1Remarks`='$Remarks',`L2ApproverStatus`='Rejected',`L2Remarks`='$Remarks' where `srno`='$SRNO'";
		else
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Rejected',`L1Remarks`='$Remarks' where `srno`='$SRNO'";
		
		mysql_query($ssql) or die(mysql_error());
	}
	else
	{
		$ssql="update `Employee_Leave_Transaction` set `ApprovalStatus`='Rejected',`L1Remarks`='$Remarks',`L2ApproverStatus`='Rejected',`L2Remarks`='$Remarks' where `srno`='$SRNO'";
		mysql_query($ssql) or die(mysql_error());
	}
	echo "<br><br><center><b>Request Rejected Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close window";
}
?>
<?php 
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$CurrentMonth= date('M');
$CurrentMontColumnName='M'.$CurrentMonth;
$EmployeeId=$_SESSION['userid'];

$rsEmpHistory=mysql_query("SELECT `srno`, `EmployeeId`, `EmployeeName`, `LeaveFrom`, `LeaveTo`, `LeaveType`, `NoOfDays`, `ContactNoDuringLeave`, `AddressDuringLeave`, `Remarks`, `EntryDate`, `ApproverId`, `ApprovalStatus`, `L2ApproverId`, `L2ApproverStatus`,`L3ApproverId`,`L3ApproverStatus` ,`StatusUpdateDate` FROM `Employee_Leave_Transaction` WHERE `EmployeeId`='$EmployeeId'");
$rsEmpDetail=mysql_query("select `Department`,email from `employee_master` where `EmpId`='$EmployeeId'");
$rowEmpDepartment=mysql_fetch_row($rsEmpDetail);
$EmpDepartment=$rowEmpDepartment[0];
$EmpEmail=$rowEmpDepartment[1];

$rsBalanceGL=mysql_query("select `$CurrentMontColumnName` from `Employee_Leave_Balance` where `EmpId`='$EmployeeId' and `LeaveType`='General Leave'");
while($row = mysql_fetch_row($rsBalanceGL))
		{
			$GLLeaveBalance=$row[0];
			break;
		}
$rsBalanceSL=mysql_query("select `$CurrentMontColumnName` from `Employee_Leave_Balance` where `EmpId`='$EmployeeId' and `LeaveType`='Sick Leave'");
while($row = mysql_fetch_row($rsBalanceSL))
		{
			$SLLeaveBalance=$row[0];
			break;
		}
$rsBalanceEL=mysql_query("select `$CurrentMontColumnName` from `Employee_Leave_Balance` where `EmpId`='$EmployeeId' and `LeaveType`='Earned Leave'");
while($row = mysql_fetch_row($rsBalanceEL))
		{
			$ELLeaveBalance=$row[0];
			break;
		}

$rsLeaveType=mysql_query("select distinct `LeaveType` from `LeaveTypeMaster`");
//echo $GLLeaveBalance."/".$SLLeaveBalance."/".$ELLeaveBalance;
//exit();

if ($_REQUEST["isSubmit"]=="yes")
{
	$Dt = $_REQUEST["txtFromDate"];
	$arr=explode('/',$Dt);
	$FromDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$Dt = $_REQUEST["txtToDate"];
	$arr=explode('/',$Dt);
	$ToDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	
	$cboLeaveType=$_REQUEST["cboLeaveType"];
	$NoOfDaysLeave=$_REQUEST["txtNoOfDaysLeave"];
	$ContactNoDuringLeave=$_REQUEST["txtContactNoDuringLeave"];
	$AddressDuringLeave=$_REQUEST["txtAddressDuringLeave"];
	$Remarks=$_REQUEST["txtRemarks"];
	$EmployeeId=$_SESSION['userid'];
	$EmployeeName=$_REQUEST['hEmployeeName'];
	$ApproverId=$_SESSION['ApproverId'];
	$currentdate=date("Y-m-d");
	

	
	$rsEmpDetail=mysql_query("select `MobileNo`,`L2_Approver_Id`,`L3_Approver_Id` from `employee_master` where `EmpId`='$EmployeeId'");
	while($rowE=mysql_fetch_row($rsEmpDetail))
	{
		$mobileno=$rowE[0];
		$L2_Approver_Id=$rowE[1];
		$L3_Approver_Id=$rowE[2];

		break;	
	}
	$message="Dear ".$EmployeeName." Your leave request from  ".$FromDate." to ". $ToDate. " has been sent to Emp Id ".$ApproverId." for approval";
	
	
	
	$ssql="INSERT INTO `Employee_Leave_Transaction` (`EmployeeId`,`EmployeeName`,`LeaveFrom`,`LeaveTo`,`LeaveType`,`NoOfDays`,`ContactNoDuringLeave`,`AddressDuringLeave`,`Remarks`,`EntryDate`,`ApproverId`,`StatusUpdateDate`,`L2ApproverId`,`L3ApproverId`,`L3ApproverStatus`) VALUES ('$EmployeeId','$EmployeeName','$FromDate','$ToDate','$cboLeaveType','$NoOfDaysLeave','$ContactNoDuringLeave','$AddressDuringLeave','$Remarks','$currentdate','$ApproverId','$currentdate','$L2_Approver_Id','$L3_Approver_Id','Pending')";
	mysql_query($ssql) or die(mysql_error());
	
	/////SENDING SMS
	if($mobileno!="")
	{
		$arr=explode('-',$FromDate);
		$FromDate1 = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
		
		$arr=explode('-',$ToDate);
		$ToDate1 = $arr[2] . "-" . $arr[1] . "-" . $arr[0];
		
	
		$message="Dear ".$EmployeeName." Your leave request from  ".$FromDate1." to ". $ToDate1. " has been sent to Emp Id ".$ApproverId." for approval";
		$message=str_replace(" ","%20",$message);
		
		$message1="Dear ".$EmployeeName." Your leave request from  ".$FromDate1." to ". $ToDate1. " has been sent to Emp Id ".$ApproverId." for approval";
		$message1=str_replace("%20"," ",$message1);
         //$message1= str_replace(' ', '%20', $your_string);
		//$mobileno="9818243377";
		  //$mobileno="9599194330";
			//$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=".$mobileno."&sms=".$message."&senderid=SCHOOL";
			
			$url="http://messagebhejo.com/submitsms.jsp?user=Eduworld&key=ea0e1f127cXX&mobile=".$mobileno."&message=".$message."&senderid=INFOSM&accusage=1";

						
						 // create a new cURL resource
						$ch = curl_init();
						// set URL and other appropriate options
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						// grab URL and pass it to the browser
						curl_exec($ch);
						// close cURL resource, and free up system resources
						if(curl_errno($ch))
						{ 
							//echo 'Curl error: ' . curl_error($ch); 
						}
						curl_close($ch);
		
		    $subject = "Leave Apply Reminder";
		  	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: communication@dpsfsis.com' . "\r\n";
			$headers .= 'Cc: communication.@dpsfsis.com' . "\r\n";
			
			//mail($to,$subject,$notice,$headers);
			echo "insert into `email_delivery` (`sadmission`, `ToEmail`, `htmlcode`, `FromEmail`, `Subject`, `date`) values ('$EmployeeId','principal@dpsfsis.com,ritusahni@dpsfsis.com,sumitranjan@dpsfsis.com,bhavnagautam@dpsfsis.com,akhilendra@dpsfsis.com,garimakhattar@dpsfsis.com','$message1','communication@dpsfsis.com','$subject','$currentdate')"."<br>";
			mysql_query("insert into `email_delivery` (`sadmission`, `ToEmail`, `htmlcode`, `FromEmail`, `Subject`, `date`) values ('$EmployeeId','principal@dpsfsis.com,ritusahni@dpsfsis.com,sumitranjan@dpsfsis.com,bhavnagautam@dpsfsis.com,akhilendra@dpsfsis.com,garimakhattar@dpsfsis.com','$message1','communication@dpsfsis.com','$subject','$currentdate')");
	
	
	}
	/////////
	
	
	echo "<br><br><center><b>Leave applied successfully!";
	exit();
}

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `Name`,`email`,`Department`,`EmpId` from `employee_master` where `EmpId`='$EmployeeId'");
while($row = mysql_fetch_row($rsEmp))
		{
			$Name=$row[0];
			$email=$row[1];
			$Department=$row[2];
			$EmpId=$row[3];
			break;
		}

if(($EmpDepartment!="ADMINISTRATIVE STAFF"))
{
	if($EmpDepartment =="ADHOC")
	{
		$ssql="SELECT `srno`,`LeaveType`,`MaxLeaves`,`FinancialYear` FROM `LeaveTypeMaster` where `LeaveType` ='LEAVE WITHOUT PAY'";
	}
	
	elseif($EmpDepartment =="CLASS IV")
	{
		$ssql="SELECT `srno`,`LeaveType`,`MaxLeaves`,`FinancialYear` FROM `LeaveTypeMaster` where `LeaveType` !='LEAVE WITHOUT PAY'";
	}
	else
	{
		$ssql="SELECT `srno`,`LeaveType`,`MaxLeaves`,`FinancialYear` FROM `LeaveTypeMaster` where `LeaveType` !='Earned Leave'";
	}
}
else
{
	
			$ssql="SELECT `srno`,`LeaveType`,`MaxLeaves`,`FinancialYear` FROM `LeaveTypeMaster`";
	
}


//echo $ssql;
//exit();


$rs= mysql_query($ssql);


$ssql="SELECT distinct `LeaveType`,`EmployeeId`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='January' and `LeaveType`=a.`LeaveType`) as `JANLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='February' and `LeaveType`=a.`LeaveType`) as `FebLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='March' and `LeaveType`=a.`LeaveType`) as `MarLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='April' and `LeaveType`=a.`LeaveType`) as `AprLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='May' and `LeaveType`=a.`LeaveType`) as `MayLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='June' and `LeaveType`=a.`LeaveType`) as `JunLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='July' and `LeaveType`=a.`LeaveType`) as `JulLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='August' and `LeaveType`=a.`LeaveType`) as `AugLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='September' and `LeaveType`=a.`LeaveType`) as `SepLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='October' and `LeaveType`=a.`LeaveType`) as `OctLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='November' and `LeaveType`=a.`LeaveType`) as `NovLeaveCount`,
(select sum(`NoOfDays`) from `Employee_Leave_Transaction` where `EmployeeId`=a.`EmployeeId` and date_format(`LeaveFrom`,'%M')='December' and `LeaveType`=a.`LeaveType`) as `DecLeaveCount`
FROM `Employee_Leave_Transaction` as `a` WHERE `EmployeeId`='$EmployeeId' group by `LeaveType`,`EmployeeId`";
$rsLeave=mysql_query($ssql);

?>
<script language="javascript">
function Validate()
{
	fnlNoOfDays();
	if(document.getElementById("txtFromDate").value=="" || document.getElementById("txtToDate").value=="")
	{
		alert("From Date / To Date is mandatory!");
		return;
	}
	
		var date1=new Date(document.getElementById("txtFromDate").value);
		var date2=new Date(document.getElementById("txtToDate").value);
		var month1=date1.getMonth()+1;
		var month2=date2.getMonth()+1;
		if (month1 != month2)
		{
			alert("You can apply leave only in the same month!");
			return;
		}

	
	if(document.getElementById("cboLeaveType").value=="Select One")
	{
		alert("Leave Type is mandatory!");
		return;
	}
	if(document.getElementById("cboLeaveType").value=="General Leave")
	{
		if(parseInt(document.getElementById("txtNoOfDaysLeave").value) > parseInt(document.getElementById("hGLLeaveBalance").value))
		{
			alert("Can not apply general leave more then balance leave");
			return;
		}
	}
	else if(document.getElementById("cboLeaveType").value=="Sick Leave")
	{
		if(parseInt(document.getElementById("txtNoOfDaysLeave").value) > parseInt(document.getElementById("hSLLeaveBalance").value))
		{
			alert("Can not apply sick leave more then balance leave");
			return;
		}
	}
	else if(document.getElementById("cboLeaveType").value=="Earned Leave")
	{
		if(parseInt(document.getElementById("txtNoOfDaysLeave").value) > parseInt(document.getElementById("hELLeaveBalance").value))
		{
			alert("Can not apply earned leave more then balance leave");
			return;
		}
	}
	
	if(document.getElementById("txtNoOfDaysLeave").value=="")
	{
		alert("No of days leave is mandatory!");
		return;
	}
	if(document.getElementById("txtContactNoDuringLeave").value=="")
	{
		alert("Contact no during leave is mandatory!");
		return;
	}
	document.getElementById("frmLeaveApply").submit();
}
function fnlNoOfDays()
{
	//alert("ok");
	if (document.getElementById("txtFromDate").value !="")
	{
		var date1=new Date(document.getElementById("txtFromDate").value);
		var date2=new Date(document.getElementById("txtToDate").value);

	var day1=date1.getDate();
	var month1=date1.getMonth()+1;
	var year1=date1.getFullYear();
	
	//var d1 = day1 + "/" + month1 + "/" + year1 ;
	var d1 = year1 + "/" + month1 + "/" + day1;
	
 	//var d2 = new Date();
 
    var day = date2.getDate();
    var month = date2.getMonth()+1;
    var year = date2.getFullYear();
    var d2 = year + "/" + month + "/" + day ; 
     
	var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
	var firstDate = new Date(year1,month1,day1);
	var secondDate = new Date(year,month,day);
 
	var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));
	document.getElementById("txtNoOfDaysLeave").value=diffDays+1;
	//alert(diffDays+1);
	}
}
function fnlUpload(recno,EmpId,LeaveType,LeaveDate)
{
	document.getElementById("btnUpload"+recno).disabled=true;
	var myWindow = window.open("UploadMedicalCertificate.php?recno=" + recno + "&EmpID=" + EmpId  + "&LeaveType=" + LeaveType+ "&LeaveDate=" + LeaveDate+ "", "width=350, height=200");	
}
</script>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>Leave Application Form</title>
<style type="text/css">

<link rel="stylesheet" type="text/css" href="../css/style.css" />

.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
</style>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="../../Admin/tcal.css" />

	<script type="text/javascript" src="../../Admin/tcal.js"></script>
	
</head>

<body>

<p>&nbsp;</p>

<p><b><font face="Cambria" size="3">Leave Application Form</font></b></p>
<hr>
<p>

</p>
<p>&nbsp;</p>
<table cellpadding="0" style="width: 100%;border-collapse:collapse" class="style1">
	<tr>
		<td colspan="4" bgcolor="#48AC2E" style="border-style: solid; border-width: 1px"><b>
		<font face="Cambria" color="#FFFFFF">Employee 
		Details</font></b></td>
	</tr>
	<tr>
		<td width="331" style="border-style: solid; border-width: 1px"><font face="Cambria">Employee Name</font></td>
		<td width="331" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<font face="Cambria">
		<?php echo $Name;?></font></td>
		<td width="331" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font face="Cambria">Email Id</font></td>
		<td width="332" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<font face="Cambria">
		<?php echo $email;?></font></td>
	</tr>
	<tr>
		<td width="1325" style="border-style: solid; border-width: 1px" colspan="4">&nbsp;</td>
	</tr>
	
	<tr>
		<td width="331" style="border-style: solid; border-width: 1px"><font face="Cambria">Department Name</font></td>
		<td width="331" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><?php echo $Department;?></font></td>
		<td width="331" style="border-style: solid; border-width: 1px"><font face="Cambria">Employee No</font></td>
		<td width="332" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><?php echo $EmpId;?></font></td>
	</tr>
	
</table>
<p>&nbsp;</p>
<form name="frmLeaveApply" id="frmLeaveApply" method="post" action="ApplyLeave.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<input type="hidden" name="hEmployeeName" id="hEmployeeName" value="<?php echo $Name;?>">
<input type="hidden" name="hGLLeaveBalance" id="hGLLeaveBalance" value="<?php echo $GLLeaveBalance;?>">
<input type="hidden" name="hSLLeaveBalance" id="hSLLeaveBalance" value="<?php echo $SLLeaveBalance;?>">
<input type="hidden" name="hELLeaveBalance" id="hELLeaveBalance" value="<?php echo $ELLeaveBalance;?>">
<input type="hidden" name="hEmpDepartment" id="hEmpDepartment" value="<?php echo $EmpDepartment;?>">
<table cellpadding="0" style="width: 100%; border-collapse:collapse" class="style1">
	<tr>
		<td colspan="4" bgcolor="#48AC2E" style="border-style: solid; border-width: 1px"><b>
		<font face="Cambria" color="#FFFFFF">Apply Leaves</font></b></td>
	</tr>
	
	<tr>
		<td width="1033" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="4">&nbsp;</td>
	</tr>
	
	<tr>
		<td width="258" style="border-style: solid; border-width: 1px"><font face="Cambria">From Date*</font></td>
		<td width="258" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<input name="txtFromDate" id="txtFromDate" size="15" class="tcal" readonly="readonly" style="float: left" class="text-box"></td>
		<td width="258" align="left" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><font face="Cambria">To Date*</font></td>
		<td width="259" align="center" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
		<input name="txtToDate" id="txtToDate" class="tcal" readonly="readonly" size="15" style="float: left" class="text-box"></td>
	</tr>
	<tr>
		<td width="1033" style="border-style: solid; border-width: 1px" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="258" style="border-style: solid; border-width: 1px"><font face="Cambria">Leave Type</font></td>
		<td width="258" align="center" style="border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
		<p align="left">
		<select size="1" name="cboLeaveType" id="cboLeaveType" onchange="fnlNoOfDays();" class="text-box">
		<option value="Select One" selected="selected">Select One</option>
		<?php
		while($row = mysql_fetch_row($rs))
		{
			$srno=$row[0];					
			$LeaveType=$row[1];					
			$MaxLeaves=$row[2];
			$FinancialYear=$row[3];
		?>
		<option value="<?php echo $LeaveType;?>"><?php echo $LeaveType;?></option>
		<?php
		}
		?>
		</select>
		</td>
		<td width="517" align="left" style="border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td width="1033" style="border-style: solid; border-width: 1px" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="258" style="border-style: solid; border-width: 1px"><font face="Cambria">Number of Days</font></td>
		<td width="258" align="center" style="border-style: solid; border-width: 1px">
		<input name="txtNoOfDaysLeave" id="txtNoOfDaysLeave" size="24" style="float: left" readonly="readonly" class="text-box"></td>
		<td width="258" align="left" style="border-style: solid; border-width: 1px"><font face="Cambria">Contact No. During Leave</font></td>
		<td width="259" align="center" style="border-style: solid; border-width: 1px">
		<input name="txtContactNoDuringLeave" id="txtContactNoDuringLeave" size="24" style="float: left" class="text-box"></td>
	</tr>
	<tr>
		<td width="1033" valign="top" style="border-style: solid; border-width: 1px" colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td width="258" style="border-style: solid; border-width: 1px"><font face="Cambria">Address During Leave</font></td>
		<td width="258" align="center" valign="top" style="border-style: solid; border-width: 1px">
		
			<p align="left"><textarea rows="2" name="txtAddressDuringLeave" id="txtAddressDuringLeave" cols="20" class="text-box"></textarea></p></td>
		<td width="258" align="left" style="border-style: solid; border-width: 1px"><font face="Cambria">Remarks</font></td>
		<td width="259" align="center" valign="top" style="border-style: solid; border-width: 1px">
		<p align="left">
		<textarea name="txtRemarks" id="txtRemarks" cols="20" rows="2" class="text-box"></textarea></td>
	</tr>
	<tr>
		<td width="1033" style="border-style: none; border-width: medium; " colspan="4">
<p>
&nbsp;</p>
		<p>
<span style="color: rgb(255, 0, 0); font-family: Cambria; font-size: 10pt; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: -webkit-left; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #FFFFFF">
System considers Saturday and Sunday as off-days. If any of these are working 
for you, kindly change &quot;No. of Days&quot; accordingly</span></p>
		<p>
&nbsp;</p>

		</td>
	</tr>
</table>
<p align="center">
<font face="Cambria">
<input type="button" value="Submit" name="btnSubmit" onclick="Javascript:Validate();" style="font-weight: 700" class="text-box"></font></p>
</form>

<p>&nbsp;</p>
<table cellpadding="0" style="width: 100%; border-collapse:collapse" class="CSSTableGenerator">
	<tr>
		<td bgcolor="#48AC2E" height="19" style="border-style: solid; border-width: 1px; width: 221px;" align="center">
		<b><font face="Cambria" color="#FFFFFF">Leaves 
		Availed History</font></b></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Jan</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Feb</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Mar</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Apr</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>May</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Jun</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Jul</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Aug</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Sep</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Oct</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Nov</strong></font></td>
		<td bgcolor="#48AC2E" align="center" height="19" style="border-style: solid; border-width: 1px; width: 92px;" >
		<font color="#FFFFFF" face="Cambria">
		<strong>Dec</strong></font></td>
	</tr>
	<?php
	
	                

		while($row1 = mysql_fetch_row($rsLeave))
		
		{
			$LeaveType=$row1[0];
			
					$MJan=$row1[2];
					$MFeb=$row1[3];
					$MMar=$row1[4];
					$MApr=$row1[5];
					$MMay=$row1[6];
					$MJun=$row1[7];
					$MJul=$row1[8];
					$MAug=$row1[9];
					$MSep=$row1[10];
					$MOct=$row1[11];
					$MNov=$row1[12];
					$MDec=$row1[13];
	?>
	<tr>
		<td style="border-style: solid; border-width: 1px; width: 221px;" align="center">
		<font face="Cambria" style="font-size: 12pt"><?PHP ECHO $LeaveType; ?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MJan;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MFeb;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MMar;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MApr;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MMay;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MJun;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MJul;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MAug;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MSep;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MOct;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt">
		<?php echo $MNov;?></font></td>
		<td align="center" style="border-style: solid; border-width: 1px; width: 92px;">
		<font face="Cambria" style="font-size: 12pt"><?php echo $MDec;?></font></td>
	</tr>
	<?php
			
	}
	?>
	</table>
<p>
&nbsp;</p>
<p>
&nbsp;</p>
<br>
<br>
<br>
<table width="100%" style="border-collapse: collapse;" border="1" class="CSSTableGenerator" cellspacing="0" cellpadding="0">

<tr>
<td height="22" align="center" class="style12" ><b><font face="Cambria">
		S No.</font></b></td>
   		<td height="22" align="center" class="style13" >
		<b><font face="Cambria">Employee Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Employee Name</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave Type</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave From</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Leave To</font></b></td>

		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Date of Apply</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 1 Approval Id</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 1 Status</font></b></td>
		<td height="22" align="center" class="style13">
		<b><font face="Cambria">Level 2 Approval Id</font></b></td>
		

		
		
		<td height="22" align="center" class="style14" width="8%">
		<b><font face="Cambria">Level 2 Status</font></b></td>
		
		
		<td height="22" align="center" class="style14" width="9%">
		<b><font face="Cambria">Level 3 Approval Id</font></b></td>
			
		<td height="22" align="center" class="style14" width="9%">
		<b><font face="Cambria">Level 3 Status</font></b></td>
		

		<td height="22" align="center" class="style14" width="9%">
		<b><font face="Cambria">Upload Medical Certificate</font></b></td>
		
		
		
		
		
				
		
</tr>
<?php
$recno=0;
	while($row = mysql_fetch_row($rsEmpHistory))
	{
	$EmployeeID=$row[1];
	$LeaveType=$row[5];
	$LeaveDate=$row[10];
	$recno=$recno+1;
?>
<tr>
<td style="width: 4%" font="Cambria" class="style13"><font face="Cambria"><?php echo $recno;?></font></td>
<td style="width: 8%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 12%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 7%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 7%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[3];?></font></td>
<td style="width: 6%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[10];?></font></td>
<td style="width: 10%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 10%" font="Cambria" class="style10"><font face="Cambria"><?php echo $row[12];?></font></td>
<td style="width: 10%" font="Cambria" class="style10"><font face="Cambria"><?php echo $row[13];?></font></td>

<td style="width: 8%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[14];?></font></td>
<td style="width: 9%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[15];?></font></td>
<td style="width: 9%" font="Cambria" class="style13"><font face="Cambria"><?php echo $row[16];?></font></td>

<td style="width: 9%" font="Cambria" class="style13">
<?php
if($LeaveType=="HPLM")
{
?>
<input name="btnUpload<?php echo $recno;?>" id="btnUpload<?php echo $recno;?>" type="button" value="Upload" style="font-weight: 700" class="text-box" onclick="javascript:fnlUpload('<?php echo $recno;?>','<?php echo $EmployeeID;?>','<?php echo $LeaveType;?>','<?php echo $LeaveDate;?>');">
<?php
}
?>
</td>
</tr>
<?php
	}
?>
</table>

</body>

</html>
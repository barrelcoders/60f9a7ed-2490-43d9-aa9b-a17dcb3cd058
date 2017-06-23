<?php include '../../connection.php';?>

<?php

$AdmissionId = $_REQUEST["admissionid"];
$Querter = $_REQUEST["Quarter"];
$SelectedFinancialYear=$_REQUEST["SelectedFinancialYear"];
$TuetionFee=$_REQUEST["TueitutionFee"];
$currentdate=date("Y-m-d");
if ($_REQUEST["TransportFee"] !="")
{
	$TransportFee=$_REQUEST["TransportFee"];
}
else
{
	$TransportFee=0;
}

if ($Querter =="Q1")
{ $DueDate="15-Apr-2014";}
if ($Querter =="Q2")
{ $DueDate="15-Jul-2014";}
if ($Querter =="Q3")
{ $DueDate="15-Oct-2014";}
if ($Querter =="Q4")
{ $DueDate="15-Jan-2014";}


		//$ssql="SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`,'" . $Querter . "' as `Quarter`,(SELECT `amount` FROM `fees_master` WHERE `feeshead`='tuitionfees' and `quarter`='" . $Querter . "' and `class`=a.`sclass`) as `PendingTution_Fee`,(select IFNULL(`routecharges`,0) from `RouteMaster` where `routeno` =a.`routeno` and `financialyear`='$SelectedFinancialYear') as `PendingTranportFee`,`smobile` FROM `student_master` as `a` WHERE `sadmission`='$AdmissionId'";
		$ssql="SELECT a.`sadmission`,a.`sclass`,a.`srollno`,a.`sname`,a.`routeno`,'" . $Querter . "' as `Quarter`,`smobile` FROM `student_master` as `a` WHERE `sadmission`='$AdmissionId'";
		$rs = mysql_query($ssql);
		while($row = mysql_fetch_row($rs))
		{
					$sadmission= $row[0];
					$sclass= $row[1];
					$srollno= $row[2];
					$sname= $row[3];
					$routeno= $row[4];
					$Quarter = $row[5];
					$PendingTution_Fee= $TuetionFee;
					$PendingTranportFee= $TransportFee;
					$StudetnMobileNo= $row[6];
					break;
		}
		$TotalAmt=$PendingTution_Fee+$TransportFee;
		
?>
<script language="javascript">
function printDiv() 
{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 }

</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Fees Reminder</title>
</head>

<body>

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
	<!--
	<p align="center"><img border="0" src="../images/emerald_logo.png"></p>
	<p align="center"><b><font face="Calibri" size="4">Sector - 79, Greater Faridabad</font></b></p>
	<p align="center"><b><font face="Calibri">Fee Slip For 2014 - 2015&nbsp; (Quarter - July to September)</font></b></p>
	<div align="center">
		<table border="1" width="32%" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Student Name</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $sname; ?></td>
			</tr>
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Admission No</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $sadmission; ?></td>
			</tr>
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Student Class</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $sclass; ?></td>
			</tr>
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Due Date</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $DueDate; ?></td>
			</tr>
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Quarter Fee</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $PendingTution_Fee; ?></td>
			</tr>
			<tr>
				<td align="left" width="211" style="border-style: dotted; border-width: 1px">
				<b><font face="Calibri">Transport Fee</font></b></td>
				<td align="center" style="border-style: dotted; border-width: 1px"><?php echo $PendingTranportFee; ?></td>
			</tr>
		</table></div>
	<blockquote>
		<blockquote>
			<blockquote>
				<blockquote>
					<blockquote>
						<blockquote>
							<ul>
								<li><font face="Calibri">Cheques /Cash can be 
								deposited at the School Counter - Monday to 
								Friday (09:00 AM TO 1:00 PM) and Saturday ((9.30 
								AM TO 12.30 PM))</font></li>
								<li><font face="Calibri">Cheques/Cash will not 
								be accepted without fine after the 10th of July 
								2014. </font></li>
								<li><font face="Calibri">Fine will be charged 
								@10/- per day after the due date i.e 10/07/2014</font></li>
							</ul>
						</blockquote>
					</blockquote>
				</blockquote>
			</blockquote>
		</blockquote>
	</blockquote>
	<p align="center"><font face="Calibri">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	Fees Incharge</font></p>
	<p align="center">&nbsp;</div>
	
	

<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a>

	</font>

</div>

-->
</body>

</html>

<?php
$notice="Dear Parent, This is the final call for the submission of third installment of school fees of your ward, failing which the name of your ward will be struck off from the school rolls. Mode of payment online; For more details visit student login at  www.dpsfsis.com or www.dpsfaridabad.in For queries, please call at : 8744078548 or 8744078558. For technical support:-8505881817 (Mr.Himanshu Sharma), Regards DPS Faridabad, Sec 19";

$ssql=" insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$sname','$sadmission','$sclass','$srollno','Fee Reminder','$StudetnMobileNo','$notice','$currentdate')";
mysql_query($ssql) or die(mysql_error());
	
	$notice=str_replace(" ","%20",$notice);
	$StudetnMobileNo="9818243377";
	$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $StudetnMobileNo . "&sms=" . $notice . "&senderid=SCHOOL";
					//echo $url;
					//exit();
					 // create a new cURL resourc
	$ch = curl_init();
				// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	// grab URL and pass it to the browser
	curl_exec($ch);
	// close cURL resource, and free up system resources
	if(curl_errno($ch))
	{ 
		echo 'Curl error: ' . curl_error($ch); 
	}
	curl_close($ch);
	echo "<br><br><center>SMS has been sent successfully!<br>Clik <a href='Javascript:window.close();'>here</a> to close window";
	
?>
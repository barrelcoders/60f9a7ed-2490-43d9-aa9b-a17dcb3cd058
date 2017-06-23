<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$TotalBillAmount=$_REQUEST["txtNewTotalBillAmount"];
$TotalHead=$_REQUEST["txtTotalHead"];
$hsadmission=$_REQUEST["hsadmission"];
$hclass=$_REQUEST["hclass"];
$hName=$_REQUEST["hName"];


for($i=1;$i<=$TotalHead;$i++)
{
	$ctrlFeeHeadName="txtfeeheadname".$i;
	$ctrlFeeHeadValue="txtNewValue".$i;
	$ctrlFeeType="txtFeeType".$i;
	
	$FeeHeadName=$_REQUEST[$ctrlFeeHeadName];
	$FeeHeadValue=$_REQUEST[$ctrlFeeHeadValue];
	$FeeType=$_REQUEST[$ctrlFeeType];
	
	//echo $FeeHeadName.":".$FeeHeadValue."<br>";
	if($FeeHeadValue==0 || $FeeHeadValue=="")
	{
		$ssql="delete from `fees_student` where  `sadmission`='$hsadmission' and `feeshead`='$FeeHeadName' and `financialyear`='2015' and `FeesType`='$FeeType'";
	}
	else
	{
		//$ssql="INSERT INTO `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$hsadmission','$hclass','$hName','$FeeHeadName','$FeeHeadValue','2015','Regular')";
		$ssql="UPDATE `fees_student` SET `amount`='$FeeHeadValue' WHERE `sadmission`='$hsadmission' AND `feeshead`='$FeeHeadName' AND `financialyear`='2015' AND `FeesType`='$FeeType'";
	}
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());	
}
	//echo "INSERT INTO `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$hsadmission','$hclass','$hName','TOTAL BILL AMOUNT','$TotalBillAmount','2015','Regular')";
	$ssql="UPDATE `fees_student` SET `amount`='$TotalBillAmount' WHERE `sadmission`='$hsadmission' AND `feeshead`='TOTAL BILL AMOUNT' AND `financialyear`='2015'";
	mysql_query($ssql) or die(mysql_error());
	
	mysql_query("delete from `fees_challan` where `sadmission`='$hsadmission'") or die(mysql_error());	
	//echo $ssql."<br>";
	//echo "Total Bill Amount:".$TotalBillAmount;
	echo "<br><br><center>Updated Successfully! <br>click <a href='GenChallanDPS.php?Class=".$hclass."'>here</a> to generate Fee Challan<br>Click here to generate Hostel Challan";
?>
<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>

<?php
$strMsg="Total Inquiry Count:";
$currentdate=date("Y-m-d");
	$ssql="SELECT count(*) as `cnt` FROM `InquiryDetail` WHERE `EntryDate`='$currentdate'";
	$rs= mysql_query($ssql);
		if (mysql_num_rows($rs) > 0)
		{
			while($row = mysql_fetch_row($rs))
			{
				$Cnt=$row[0];
				$strMsg=$strMsg.$Cnt;
			}
		}
		else
		{
			$Cnt=0;
			$strMsg=$strMsg.$Cnt;
		}
	
	$strMsg=$strMsg.",Total Registration Form Count:";	
	$ssql="SELECT count(*) as `cnt` FROM `RegistrationFees` WHERE `date`='$currentdate' and `FormNo` != ''";
	$rs1= mysql_query($ssql);
		if (mysql_num_rows($rs1) > 0)
		{
			while($row = mysql_fetch_row($rs1))
			{
				$Cnt=$row[0];
				$strMsg=$strMsg.$Cnt;
			}
		}
		else
		{
			$Cnt=0;
			$strMsg=$strMsg.$Cnt;
		}
		
	$strMsg=$strMsg.",Total Registration Count:";	
	$ssql="SELECT count(*) as `cnt` FROM `RegistrationFees` WHERE `date`='$currentdate' and `RegistrationNo` != ''";
	$rs2= mysql_query($ssql);
		if (mysql_num_rows($rs2) > 0)
		{
			while($row = mysql_fetch_row($rs2))
			{
				$Cnt=$row[0];
				$strMsg=$strMsg.$Cnt;
			}
		}
		else
		{
			$Cnt=0;
			$strMsg=$strMsg.$Cnt;
		}
		
	$strMsg=$strMsg.",Total Admission Count:";	
	$ssql="SELECT count(*) as `cnt` FROM `AdmissionFees` WHERE `EntryDate`='$currentdate'";
	$rs3= mysql_query($ssql);
		if (mysql_num_rows($rs3) > 0)
		{
			while($row = mysql_fetch_row($rs3))
			{
				$Cnt=$row[0];
				$strMsg=$strMsg.$Cnt;
			}
		}
		else
		{
			$Cnt=0;
			$strMsg=$strMsg.$Cnt;
		}
		
		echo $strMsg;
		exit();
?>
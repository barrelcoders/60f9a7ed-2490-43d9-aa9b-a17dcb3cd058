<?php include '../../connection.php'; ?>
<?php include '../../AppConf.php';?>
<?php
	$datetime2hoursbefore = date("Y-m-d H:m:s", strtotime('-2 hours', time()));
	
	mysql_query("insert into `FeesTempVsCitrus` (`TxnId`,`PGTxnIdSystem`,`StatusSystem`) SELECT `TxnId`,`PGTxnId`,`TxnStatus` FROM `fees_misc_collection_tmp` WHERE `TxnStatus`='Pending' and `TxnId` not in (select distinct `TxnId` from `FeesTempVsCitrus`)");
	$rsPending=mysql_query("select `TxnId` from `FeesTempVsCitrus` where `PGTxnIdCitrus`='' and `StatusCitrus`='' limit 100");
	while($rowP = mysql_fetch_row($rsPending))
	{
		$txnid=$rowP[0];
		//$PGTxnIdSytem=$rowP[1];
		//$TxnStatusSystem=$rowP[2];
		//echo $txnid."/".$PGTxnIdSytem."/".$TxnStatusSystem."<br>";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://admin.citruspay.com/api/v2/txn/enquiry/".$txnid);
		curl_setopt($ch, CURLOPT_GET, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$headers = array();
		//$headers[] = 'access_key: JS3VDQQ2VPJKVOZWV00I';
		$headers[] = 'access_key: TSM9NRK8GI01W8LYLHKR';
		$headers[] = 'Accept: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$server_output = curl_exec ($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   if($httpcode==200)
  {
		curl_close ($ch);
		$jsonData=str_replace('{"enquiryResponse":[{','',$server_output);
		$jsonData=str_replace('}]}','',$jsonData);
		//echo $jsonData."<br>";
		$sstr=$jsonData;
		if($sstr !="")
		{
			$arr=explode(",", str_replace('"','',$sstr));
			//echo "Response Msg:".str_replace("respMsg:","",$arr[1]).",PGTxnId:".str_replace("pgTxnId:","",$arr[3]);
			$txnstatus=str_replace("respMsg:","",$arr[1]);
			$pgtxnno=str_replace("pgTxnId:","",$arr[3]);
			$txnDateTime=str_replace("txnDateTime:","",$arr[6]);
			//echo $txnid."/".$txnstatus."/".$pgtxnno."<br>";
		}
		else
		{
			$txnstatus="No Response";
			$pgtxnno="";
			$txnDateTime="";
		}
		
		//$sstr="insert into `FeesTempVsCitrus` (`TxnId`,`PGTxnIdSystem`,`PGTxnIdCitrus`,`StatusSystem`,`StatusCitrus`,`TxnDateTime`) values ('$txnid','$PGTxnIdSytem','$pgtxnno','$TxnStatusSystem','$txnstatus','$txnDateTime')";
		$sstr="update `FeesTempVsCitrus` set `StatusCitrus`='$txnstatus',`PGTxnIdCitrus`='$pgtxnno',`TxnDateTime`='$txnDateTime' where `TxnId`='$txnid'";
		mysql_query($sstr);		
	}
		//echo "Successful!";
	}
	
	
	mysql_query("delete from `FeesTempVsCitrus` where `TxnDateTime`>'$datetime2hoursbefore' and `Tranferred`='Pending'");
   $sql = "SELECT `TxnId`,`PGTxnIdCitrus`,`StatusCitrus` FROM `FeesTempVsCitrus` where `TxnDateTime`<='$datetime2hoursbefore' and `StatusCitrus` !='Transaction successful' and `Tranferred`='Pending'";
   echo $sql;
   exit();
   $rs= mysql_query($sql);
	while($row = mysql_fetch_row($rs))
	{
		$TxnId=$row[0];
		$PGTxnIdCitrus=$row[1];
		$StatusCitrus=$row[2];
		$currentdate=date("Y-m-d");
		mysql_query("update `fees_misc_collection_tmp` set `PGTxnId`='$PGTxnIdCitrus',`TxnStatus`='$StatusCitrus' where `TxnId`='$TxnId'") or die(mysql_error());
		mysql_query("update `FeesTempVsCitrus` set `Tranferred`='COMPLETE' where `TxnId`='$TxnId'") or die(mysql_error());
   	}
   	

echo "Done";
exit();

?>
<?php
	$rsPending=mysql_query("select `TxnId`,`PGTxnIdCitrus`,`StatusCitrus` from `FeesTempVsCitrus` where `StatusSystem`='Pending' limit 10");
	while($rowP = mysql_fetch_row($rsPending))
	{
		
			$txnid=$rowP[0];
			$txnstatus=$rowP[2];
			$pgtxnno=$rowP[1];
		
			$ssql="UPDATE `fees_misc_collection_tmp1` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno' where `TxnId`='$txnid'";
			echo $ssql."<br>";
			//mysql_query($ssql) or die(mysql_error());
			
			
			if($txnstatus =="Transaction successful")
			{
				$txnstatus="SUCCESS";
			}
			$txnstatus="SUCCESS";
			if($txnstatus !="SUCCESS")
			{
				echo "<br><br><center>Your Transaction was not successfully completed!<br>You are requested to kindly payment again<br><br>Click <a href='FeesPaymentUser.php'>here</a> to restart the process!";
				exit();
			}
			else
			{
			$rsCnt=mysql_query("SELECT max(CONVERT(replace(`FeeReceipt`,'MR/2015-16/OL/EF',''),UNSIGNED INTEGER)) as `cnt` FROM `fees_misc_collection1`");
			if (mysql_num_rows($rsCnt) > 0)
			{
				while($rowCnt = mysql_fetch_row($rsCnt))
				{
					$NewSrNo=$rowCnt[0]+1;
					break;
				}
			}
			else
			{

				$NewSrNo=1;
			}
			
			$ReceiptNo="MR/2015-16/OL/EF".$NewSrNo;
			echo "UPDATE `fees_misc_collection_tmp1` SET `FeeReceipt`='$ReceiptNo' where `TxnId`='$txnid'"."<br>";
			//mysql_query("UPDATE `fees_misc_collection_tmp1` SET `FeeReceipt`='$ReceiptNo' where `TxnId`='$txnid'") or die(mysql_error());
			$rsChk= mysql_query("select * from `fees_misc_collection1` where `TxnId`='$txnid'");
			if (mysql_num_rows($rsChk) == 0)
			{
				echo "insert into `fees_misc_collection1` (`date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt`) select `date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt` from `fees_misc_collection_tmp1` where `TxnId`='$txnid'"."<br>";
				//mysql_query("insert into `fees_misc_collection1` (`date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt`) select `date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt` from `fees_misc_collection_tmp1` where `TxnId`='$txnid'") or die(mysql_error());
			}

		
			$currentdate=date("Y-m-d");
			$currentmonth=date("M");
			$currentYear=date("Y");
			
			//$rsD=mysql_query("select `date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt` from `fees_misc_collection1` where `TxnId`='$txnid'");
			$rsD=mysql_query("select `date`,`HeadName`,`sadmissionno`,`sname`,`sclass`,`srollno`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`FeeReceipt` from `fees_misc_collection_tmp1` where `TxnId`='$txnid'");
			while($rowD=mysql_fetch_row($rsD))
			{
				$date=$rowD[0];
				$HeadName=$rowD[1];
				$sadmissionno=$rowD[2];
				$sname=$rowD[3];
				$sclass=$rowD[4];
				$srollno=$rowD[5];
				$amount=$rowD[6];
				$PaymentMode=$rowD[7];
				//$TxnId=$rowD[8];
				//$TxnStatus=$rowD[9];
				//$PGTxnId=$rowD[10];
				$FeeReceipt=$rowD[11];
				break;
				
			}	

//****************	
?>
<?php
$strOneReceipt='
<div id="MasterDiv">
<style type="text/css">
.style4 {
	text-align: left;
}
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
</style>

	<p align="center">

	<font face="Cambria">

	<img border="0" src="../Admin/images/logo.png"  height="81" width="288"></font></p>
	<p align="center" ><font face="Cambria"><span class="style5">'.$SchoolAddress.'</span></font><br><b><font face="Cambria">
	(MISC. Fees Receipt)</font></b></p>
	
	
	<p align="center"><b>Receipt No.&nbsp;'.$ReceiptNo.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:&nbsp;'.date("d-m-Y").'</b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 672px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px">

				<font face="Cambria">Student Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">'.$sname.'

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Admission No</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">'.$sadmissionno.'

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">'.$sclass.'</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria"> Fees Type</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				Misc.

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<font face="Cambria"> Payment Mode</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">
				<font face="Cambria">
				Online
				</font>
				</td>

			</tr>

			

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Fees Paid</td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">'.$amount.'</font></td>

			</tr>

			</table>
</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
	<p align="center"><font face="Cambria">This is an electronically generated receipt and does not require any signature.</font></p>
</div>';
//echo $strOneReceipt;
		$ssql="insert into `fees_receipt_code` (`sadmission`,`ReceiptNo`,`ReceiptCode`) values ('$sadmission','$ReceiptNo','$strOneReceipt')";
		echo $ssql."<br>";
		//mysql_query($ssql) or die(mysql_error());
		$strOneReceipt="";
	}//End of If Condition in case of transaction successful
}//End of First While Loop
?>

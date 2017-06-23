<?php include '../../connection.php'; ?>
<?php include '../../AppConf.php';?>
<?php
$datetime2hoursbefore = date("Y-m-d H:m:s", strtotime('-2 hours', time()));
	
	mysql_query("insert into `FeesRegularTempVsCitrus` (`TxnId`,`PGTxnIdSystem`,`StatusSystem`) SELECT `TxnId`,`PGTxnId`,`TxnStatus` FROM `fees_temp` WHERE `TxnStatus`='Pending' and `TxnId` not in (select distinct `TxnId` from `FeesRegularTempVsCitrus`)");
	
	$rsPending=mysql_query("select `TxnId` from `FeesRegularTempVsCitrus` where `PGTxnIdCitrus`='' and `StatusCitrus`='' limit 100");
	while($rowP = mysql_fetch_row($rsPending))
	{
		$txnid=$rowP[0];
		//$PGTxnIdSytem=$rowP[1];
		//$TxnStatusSystem=$rowP[2];
		//echo $txnid."/".$PGTxnIdSytem."/".$TxnStatusSystem."<br>";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://admin.citruspay.com/api/v2/txn/enquiry/".$txnid);
		//curl_setopt($ch, CURLOPT_GET, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
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
		
		
		$sstr="update `FeesRegularTempVsCitrus` set `StatusCitrus`='$txnstatus',`PGTxnIdCitrus`='$pgtxnno',`TxnDateTime`='$txnDateTime' where `TxnId`='$txnid'";
		mysql_query($sstr);		
	}
		//echo "Successful!";
	}
	
	
	
	mysql_query("delete from `FeesRegularTempVsCitrus` where `TxnDateTime`>'$datetime2hoursbefore' and `Tranferred`='Pending'");
	
	$sql = "SELECT `TxnId`,`PGTxnIdCitrus`,`StatusCitrus` FROM `FeesRegularTempVsCitrus` where `TxnDateTime`<='$datetime2hoursbefore' and `StatusCitrus` !='Transaction successful' and `Tranferred`='Pending'";
   	$rs= mysql_query($sql);
	while($row = mysql_fetch_row($rs))
	{
		$TxnId=$row[0];
		$PGTxnIdCitrus=$row[1];
		$StatusCitrus=$row[2];
		$currentdate=date("Y-m-d");
		mysql_query("update `fees_temp` set `PGTxnId`='$PGTxnIdCitrus',`TxnStatus`='$StatusCitrus' where `TxnId`='$TxnId'") or die(mysql_error());
		mysql_query("update `FeesRegularTempVsCitrus` set `Tranferred`='COMPLETE' where `TxnId`='$TxnId'") or die(mysql_error());
   	}

echo "Done";
exit();

?>
<?php
$txnid="5781e0c311362";
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
			echo $txnid."/".$txnstatus."/".$pgtxnno."<br>";
		}
		else
		{
			$txnstatus="No Response";
			$pgtxnno="";
			$txnDateTime="";
		}
	}
?>
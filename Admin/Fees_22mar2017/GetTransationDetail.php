<?php include '../../connection.php';?>
<?php
$rs=mysql_query("select `TxnID` from `tempTxn` where `CitrusTxnID`=''");
while($row=mysql_fetch_row($rs))
{
	$txnId=$row[0];
	$jsonData="";
	//$txnId=$_REQUEST["txnid"];
	//$txnId="55c9a1aa23366";
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://admin.citruspay.com/api/v2/txn/enquiry/$txnId");

	curl_setopt($ch, CURLOPT_GET, 1);

	//curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$headers = array();

	//$headers[] = 'Merchant: JS3VDQQ2VPJKVOZWV00I';

	//$headers[] = 'Accept: application/json';

	$headers[] = 'access_key: TSM9NRK8GI01W8LYLHKR';

	

	$headers[] = 'Accept: application/json';

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$server_output = curl_exec ($ch);

	curl_close ($ch);

	//print  $server_output ;

	//echo "<br>";

	$jsonData=str_replace('{"enquiryResponse":[{','',$server_output);

	$jsonData=str_replace('}]}','',$jsonData);

	//echo $jsonData;

	$jsonData=str_replace('"','',$jsonData);

	//echo $jsonData;
	//echo "<br>";
	//exit();

	//echo "update `tempTxn` set `Response`='$jsonData' where `TxnID`='$txnId'";
	$sstr=$jsonData;
	
	$RefundStatus="";
	
	
	$pos = strpos($sstr, "txnType:REFUND");
	if ($pos === false) 
	{	    
	} 
	else 
	{
	    $RefundStatus="Yes";
	}
	


	if($jsonData !="")
	{
			$arr=explode(",", str_replace('"','',$sstr));
			//echo "Response Msg:".str_replace("respMsg:","",$arr[1]).",PGTxnId:".str_replace("pgTxnId:","",$arr[3]);
			$txnstatus=str_replace("respMsg:","",$arr[1]);
			$pgtxnno=str_replace("pgTxnId:","",$arr[3]);
			$txtDateTime=str_replace("txnDateTime:","",$arr[6]);
			$txtAmount=str_replace("amount:","",$arr[7]);
			$RefundAmount=0;
			if($RefundStatus=="Yes")
			{
				$RefundAmount=$txtAmount;
			}
			
			//echo "Citrus Txn Status:".$txnstatus."<br>Citrus PG Txn No:".$pgtxnno."<br>TxnDateTime:".$txtDateTime."<br>TxnAmount:".$txtAmount."<br>Refund Status:".$RefundStatus."<br>Refund Amount:".$RefundAmount;
		mysql_query("update `tempTxn` set `CitrusTxnID`='$pgtxnno',`CitrusTxnAmount`='$txtAmount',`CitrusTxnDate`='$txtDateTime',`CitrusTxnStatus`='$txnstatus',`CitrusRefundStatus`='$RefundStatus' where `TxnID`='$txnId'");
	}
}

//$jsonData = '{ "user":"John", "age":22, "country":"United States" }';

/*

$phpArray = json_decode($server_output);

print_r($phpArray);

foreach ($phpArray as $key => $value) { 

    echo "<p>$key | $value</p>";

}

*/



?>
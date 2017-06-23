<?php
include '../../connection.php';
?>
<?php
$rs=mysql_query("select `trans_id`,`seller_id`,`TotalAmount`,`srno` from `Commerce_OrderDetail` where `OrderNo` in (select distinct `OrderNo` from `Commerce_OrderFinal` where `TxnStatus`='SUCCESS') and `VendorPaymentStatus`='Pending'");
$rowD=mysql_fetch_row($rs);

$trans_id=$rowD[0];
$seller_id=$rowD[1];
$FinalAmount=$rowD[2];
$srno=$rowD[3];

$settlement_ref=Date('YmdHis');
$settlement_date_time=Date('Y-m-d H:i:s');

/*
$response='{"split_id":7925,"trans_id":5589,"merchant_split_ref":"20160318223111"}';
$arrresponse=explode(",",$response);
$arrresponse1=explode(":",$arrresponse[0]);
$split_id=$arrresponse1[1];
echo $split_id;
*/

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://splitpaysbox.citruspay.com/marketplace/pgsettlement/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\"trans_id\":".$trans_id.",\r\n\"settlement_ref\":\"".$settlement_ref."\",\r\n\"trans_source\":\"CITRUS\",\r\n\"settlement_amount\":".$FinalAmount.",\r\n\"fee_amount\":0,\r\n\"settlement_date_time\":\"".$settlement_date_time."\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "auth_token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2Nlc3Nfa2V5IjoiU05LMDlVUTJDQzFWN0c3R0hVMlgiLCJleHBpcmVzIjoiMjAxNi0wMy0yM1QxMDoyNzoyNy40MDlaIiwiY2FuX3RyYW5zYWN0IjoxLCJhZG1pbiI6MH0.nVmiwEKJ0owjVUBL80Y-1PW-v7sf9eYpXfOWZZJGINg",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 4b701531-8b78-5d70-a00a-5e9d7197614c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "cURL Error #:" . $err;
} 
else 
{
  echo $response;
	$arrresponse=explode(",",$response);
	$arrresponse1=explode(":",$arrresponse[0]);
	$settlement_id=$arrresponse1[1];
	echo $settlement_id;
	mysql_query("update `Commerce_OrderDetail` set `settlement_ref`='$settlement_ref',`settlement_id`='$settlement_id',`settlement_amount`='$FinalAmount',`fee_amount`='0',`settlement_date_time`='$settlement_date_time' where `srno`='$srno'");
}
?>
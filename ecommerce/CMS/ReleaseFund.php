<?php
include '../../connection.php';
?>
<?php
$rs=mysql_query("select `trans_id`,`seller_id`,`TotalAmount`,`srno`,`split_id` from `Commerce_OrderDetail` where `OrderNo` in (select distinct `OrderNo` from `Commerce_OrderFinal` where `TxnStatus`='SUCCESS') and `VendorPaymentStatus`='Pending'");
$rowD=mysql_fetch_row($rs);

$trans_id=$rowD[0];
$seller_id=$rowD[1];
$FinalAmount=$rowD[2];
$srno=$rowD[3];
$split_id=$rowD[4];

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
  CURLOPT_URL => "https://splitpaysbox.citruspay.com/marketplace/funds/release/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\"split_id\":".$split_id."\r\n}",
  CURLOPT_HTTPHEADER => array(
    "auth_token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2Nlc3Nfa2V5IjoiU05LMDlVUTJDQzFWN0c3R0hVMlgiLCJleHBpcmVzIjoiMjAxNi0wMy0yM1QxMDoyNzoyNy40MDlaIiwiY2FuX3RyYW5zYWN0IjoxLCJhZG1pbiI6MH0.nVmiwEKJ0owjVUBL80Y-1PW-v7sf9eYpXfOWZZJGINg",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 712a005f-7021-3b1a-cd26-8c78422c45e8"
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
	$releasefund_ref=$arrresponse1[1];
	
	$arrresponse2=explode(":",$arrresponse[4]);
	$releasefund_amount=$arrresponse2[1];
	
	$arrresponse3=explode(":",$arrresponse[5]);
	$releasefund_payout=str_replace('}','',str_replace('"','',$arrresponse3[1]));
	
	echo $settlement_id;
	mysql_query("update `Commerce_OrderDetail` set `releasefund_ref`='$releasefund_ref',`releaseamount`='$releasefund_amount',`payout`='$releasefund_payout' where `srno`='$srno'");
}
?>
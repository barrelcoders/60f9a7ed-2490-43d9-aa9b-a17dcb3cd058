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

$merchant_split_ref=Date('YmdHis');

/*
$response='{"split_id":7925,"trans_id":5589,"merchant_split_ref":"20160318223111"}';
$arrresponse=explode(",",$response);
$arrresponse1=explode(":",$arrresponse[0]);
$split_id=$arrresponse1[1];
echo $split_id;
*/

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://splitpaysbox.citruspay.com/marketplace/split/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\"trans_id\":".$trans_id.",\n\"seller_id\":".$seller_id.",\n\"merchant_split_ref\":\"".$merchant_split_ref."\",\n\"split_amount\":".$FinalAmount.",\n\"fee_amount\":0,\n\"auto_payout\":1\n}",
  CURLOPT_HTTPHEADER => array(
    "auth_token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2Nlc3Nfa2V5IjoiU05LMDlVUTJDQzFWN0c3R0hVMlgiLCJleHBpcmVzIjoiMjAxNi0wMy0yM1QxMDoyNzoyNy40MDlaIiwiY2FuX3RyYW5zYWN0IjoxLCJhZG1pbiI6MH0.nVmiwEKJ0owjVUBL80Y-1PW-v7sf9eYpXfOWZZJGINg",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 5409b1ba-4245-d74d-a5ce-67bcef3e998b"
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
	$split_id=$arrresponse1[1];
	echo $split_id;
	mysql_query("update `Commerce_OrderDetail` set `merchant_split_ref`='$merchant_split_ref',`split_id`='$split_id',`split_amount`='$FinalAmount',`fee_amount`='0' where `srno`='$srno'");
}
?>
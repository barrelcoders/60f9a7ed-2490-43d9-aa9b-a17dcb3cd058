<?php
include '../../connection.php';
?>
<?php
	$sellername=$_REQUEST["sellername"];
	$address1=$_REQUEST["address1"];
	$address2=$_REQUEST["address2"];
	$city=$_REQUEST["city"];
	$state=$_REQUEST["state"];
	$country=$_REQUEST["country"];
	$zip=$_REQUEST["zip"];
	$sellermobile=$_REQUEST["sellermobile"];
	$ifsccode=$_REQUEST["ifsccode"];
	$accountnumber=$_REQUEST["accountnumber"];
	$selleremail=$_REQUEST["selleremail"];
	$payoutmode=$_REQUEST["payoutmode"];
	$active=$_REQUEST["active"];
?>

<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://splitpaysbox.citruspay.com/marketplace/seller",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\r\n\"seller_name\":\"".$sellername."\",\r\n\"seller_add1\":\"".$address1."\",\r\n\"seller_add2\":\"".$address2."\",\r\n\"seller_city\":\"".$city."\",\r\n\"seller_state\":\"".$state."\",\r\n\"seller_country\":\"".$country."\",\r\n\"zip\":\"".$zip."\",\r\n\"business_url\":\"www.eduworldtech.com\",\r\n\"seller_mobile\":\"".$sellermobile."\",\r\n\"seller_ifsc_code\":\"".$ifsccode."\",\r\n\"seller_acc_num\":\"".$accountnumber."\",\r\n\"active\":".$active.",\r\n\"payoutmode\":\"".$payoutmode."\",\r\n\"selleremail\":\"".$selleremail."\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "auth_token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhY2Nlc3Nfa2V5IjoiU05LMDlVUTJDQzFWN0c3R0hVMlgiLCJleHBpcmVzIjoiMjAxNi0wMy0yM1QxMDoyNzoyNy40MDlaIiwiY2FuX3RyYW5zYWN0IjoxLCJhZG1pbiI6MH0.nVmiwEKJ0owjVUBL80Y-1PW-v7sf9eYpXfOWZZJGINg",
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 0b0f39de-d6d8-fc40-0538-b52894451b1a"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
  exit();
} 
else 
{
  //echo $response."<BR>";
}
//echo str_replace('}','',str_replace('{"sellerid":','',$response));
?>
<?php
/*
$response='{
  "sellerid": 572
}';

$response=str_replace("{","",$response);
$response=str_replace("}","",$response);
$response=str_replace('"sellerid": ','',$response);
*/
$SellerId= str_replace('}','',str_replace('{"sellerid":','',$response));
mysql_query("insert into `Commerce_supplier_master` (`sellerid`, `seller_name`, `seller_add1`, `seller_add2`, `seller_city`, `seller_state`, `seller_country`, `zip`, `business_url`, `seller_mobile`, `seller_ifsc_code`, `seller_acc_num`, `active`, `payoutmode`, `selleremail`) values ('$SellerId','$sellername','$address1','$address2','$city','$state','$country','$zip','www.eduworldtech.com','$sellermobile','$ifsccode','$accountnumber','$active','$payoutmode','$selleremail')");
echo "<br><br><center><b>Registered Successfully!<br>";
//echo "insert into `Commerce_supplier_master` (`sellerid`, `seller_name`, `seller_add1`, `seller_add2`, `seller_city`, `seller_state`, `seller_country`, `zip`, `business_url`, `seller_mobile`, `seller_ifsc_code`, `seller_acc_num`, `active`, `payoutmode`, `selleremail`) values ('$SellerId','$sellername','$address1','$address2','$city','$state','$country','$zip','www.eduworldtech.com','$sellermobile','$ifsccode','$accountnumber','$active','$payoutmode','$selleremail')";
?>